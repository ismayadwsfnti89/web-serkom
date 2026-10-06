<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('username', 'like', "%{$keyword}%")
                  ->orWhere('role', 'like', "%{$keyword}%");
            });
        }

        $user = $query->latest()->paginate(10)->withQueryString();

        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,operator',
        ]);

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

    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

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

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')
                        ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $user = User::findOrFail($id);

        if ($user->id_user === Auth::id()) {
            return redirect()->route('user.index')
                            ->with('error', 'Anda tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('user.index')
                        ->with('success', 'User berhasil dihapus.');
    }
}