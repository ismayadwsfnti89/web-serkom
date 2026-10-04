<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
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

    public function create()
    {
        return view('guru.create');
    }

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

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'nullable|string|max:30',
            'jabatan'   => 'nullable|string|max:100',
            'mapel'     => 'nullable|string|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

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

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto && file_exists(public_path('uploads/guru/' . $guru->foto))) {
            unlink(public_path('uploads/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()->route('guru.index')
                         ->with('success', 'Data guru berhasil dihapus.');
    }
}