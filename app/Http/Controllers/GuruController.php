<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

/**
 * Controller Data Guru.
 *
 * Mengelola CRUD data guru & staf, termasuk upload foto.
 *
 * @author  [Nama Kamu]
 * @version 1.0
 * @date    2026-10-09
 */
class GuruController extends Controller
{
    /**
     * Menampilkan daftar guru dengan search & pagination.
     */
    public function index(Request $request)
    {
        $query = Guru::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_guru', 'like', "%{$keyword}%")
                  ->orWhere('nip', 'like', "%{$keyword}%")
                  ->orWhere('jabatan', 'like', "%{$keyword}%")
                  ->orWhere('mapel', 'like', "%{$keyword}%");
            });
        }

        $guru = $query->latest()->paginate(10)->withQueryString();

        return view('guru.index', compact('guru'));
    }

    /**
     * Menampilkan form tambah guru.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Menyimpan data guru baru (termasuk upload foto).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'nullable|string|max:30',
            'jabatan'   => 'nullable|string|max:100',
            'mapel'     => 'nullable|string|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil semua data kecuali foto (diproses terpisah)
        $data = $request->except('foto');

        // Upload foto kalau ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/guru'), $filename);
            $data['foto'] = $filename;
        }

        Guru::create($data);

        return redirect()->route('guru.index')
                         ->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail guru.
     */
    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    /**
     * Menampilkan form edit guru.
     */
    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Memperbarui data guru.
     *
     * Kalau upload foto baru, foto lama dihapus dulu.
     */
    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'nullable|string|max:30',
            'jabatan'   => 'nullable|string|max:100',
            'mapel'     => 'nullable|string|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        // Kalau ada foto baru → hapus foto lama, upload foto baru
        if ($request->hasFile('foto')) {
            if ($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto))) {
                unlink(public_path('uploads/guru/' . $guru->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/guru'), $filename);
            $data['foto'] = $filename;
        }

        $guru->update($data);

        return redirect()->route('guru.index')
                        ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Menghapus data guru (termasuk fotonya).
     */
    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $guru = Guru::findOrFail($id);

        // Hapus file foto dari folder
        if ($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto))) {
            unlink(public_path('uploads/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()->route('guru.index')
                        ->with('success', 'Data guru berhasil dihapus.');
    }
}
