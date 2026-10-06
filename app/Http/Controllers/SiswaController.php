<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nisn', 'like', "%{$keyword}%")
                  ->orWhere('nama_siswa', 'like', "%{$keyword}%")
                  ->orWhere('tahun_masuk', 'like', "%{$keyword}%");
            });
        }

        $siswa = $query->latest()->paginate(10)->withQueryString();

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswa,nisn',
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'nullable|digits:4',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // ============ PAKAI ENCRYPTED ID ============
    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswa,nisn,' . $id . ',id_siswa',
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'nullable|digits:4',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil dihapus.');
    }
}