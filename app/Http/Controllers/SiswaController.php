<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Tampilkan daftar siswa
    public function index()
    {
        $siswa = Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswa'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('siswa.create');
    }

    // Simpan data baru
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
                         ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // Tampilkan detail (opsional)
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn'          => 'required|string|max:10|unique:siswa,nisn,' . $id . ',id_siswa',
            'nama_siswa'    => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'nullable|digits:4',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
                         ->with('success', 'Data siswa berhasil dihapus!');
    }
}
