<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Daftar guru
    public function index()
    {
        $guru = Guru::latest()->paginate(10);
        return view('guru.index', compact('guru'));
    }

    // Form tambah
    public function create()
    {
        return view('guru.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'nullable|string|max:15',
            'jabatan'   => 'nullable|string|max:100',
            'mapel'     => 'nullable|string|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        // Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/guru'), $filename);
            $data['foto'] = $filename;
        }

        Guru::create($data);

        return redirect()->route('guru.index')
                         ->with('success', 'Data guru berhasil ditambahkan!');
    }

    // Detail guru
    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    // Form edit
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'nullable|string|max:15',
            'jabatan'   => 'nullable|string|max:100',
            'mapel'     => 'nullable|string|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        // Upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
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
                         ->with('success', 'Data guru berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus foto
        if ($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto))) {
            unlink(public_path('uploads/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()->route('guru.index')
                         ->with('success', 'Data guru berhasil dihapus!');
    }
}
