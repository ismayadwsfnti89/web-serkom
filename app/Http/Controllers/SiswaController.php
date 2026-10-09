<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

/**
 * Controller Data Siswa.
 *
 * Mengelola CRUD data siswa.
 *
 * @author  [Nama Kamu]
 * @version 1.0
 * @date    2026-10-09
 */
class SiswaController extends Controller
{
    /**
     * Menampilkan daftar siswa dengan search & pagination.
     */
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Filter berdasarkan NISN, nama, atau tahun masuk
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

    /**
     * Menampilkan form tambah siswa.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Menyimpan data siswa baru.
     */
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

    /**
     * Menampilkan detail siswa.
     */
    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Menampilkan form edit siswa.
     */
    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Memperbarui data siswa.
     */
    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);

        // Validasi (NISN unik, tapi kecuali ID sendiri)
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

    /**
     * Menghapus data siswa.
     */
    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil dihapus.');
    }
}
