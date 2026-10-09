<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Controller Manajemen User.
 *
 * Mengelola data user (admin & operator):
 * - Menampilkan daftar user
 * - Menambah user baru
 * - Mengubah data user
 * - Menghapus user
 * - Mengelola profil user sendiri (ganti nama & password)
 *
 * @author  [Nama Kamu]
 * @version 1.0
 * @date    2026-10-09
 */
class UserController extends Controller
{
    /**
     * Menampilkan daftar user dengan fitur search & pagination.
     *
     * Initial state : Request dari halaman /user
     * Final state   : View user.index dengan data user terpaginasi
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan keyword (nama, username, atau role)
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('username', 'like', "%{$keyword}%")
                  ->orWhere('role', 'like', "%{$keyword}%");
            });
        }

        // Urutkan dari terbaru, 10 per halaman
        $user = $query->latest()->paginate(10)->withQueryString();

        return view('user.index', compact('user'));
    }

    /**
     * Menampilkan form tambah user.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Menyimpan user baru ke database.
     *
     * Password di-hash pakai bcrypt sebelum disimpan.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,operator',
        ]);

        // Simpan user baru (ID pakai UUID)
        User::create([
            'id_user'  => Str::uuid(),
            'nama'     => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('user.index')
                         ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail user berdasarkan ID (yang dienkripsi di URL).
     */
    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Menampilkan form edit user.
     */
    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Memperbarui data user.
     *
     * Password hanya diubah kalau field-nya diisi.
     */
    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $user = User::findOrFail($id);

        $request->validate([
            'nama'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id . ',id_user',
            'password' => 'nullable|string|min:6',
            'role'     => 'required|in:admin,operator',
        ]);

        $data = [
            'nama'     => $request->nama,
            'username' => $request->username,
            'role'     => $request->role,
        ];

        // Cuma update password kalau user isi field password
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')
                        ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Menampilkan halaman "Profil Saya".
     *
     * Halaman ini bisa diakses semua role yang login.
     */
    public function profilSaya()
    {
        $user = Auth::user();
        return view('user.profil-saya', compact('user'));
    }

    /**
     * Memperbarui profil user sendiri (nama & password).
     *
     * User hanya bisa ubah nama & password sendiri,
     * tidak bisa ubah role atau username.
     */
    public function updateProfilSaya(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama'     => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->nama = $request->nama;

        // Password hanya diubah kalau diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profil.saya')
                         ->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Menghapus user.
     *
     * User tidak bisa menghapus akun sendiri.
     */
    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $user = User::findOrFail($id);

        // Cegah user hapus akun sendiri
        if ($user->id_user === Auth::id()) {
            return redirect()->route('user.index')
                            ->with('error', 'Anda tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('user.index')
                        ->with('success', 'User berhasil dihapus.');
    }
}
