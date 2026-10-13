<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_prestasi', 'like', "%{$keyword}%")
                  ->orWhere('tingkat', 'like', "%{$keyword}%")
                  ->orWhere('juara', 'like', "%{$keyword}%")
                  ->orWhere('tahun', 'like', "%{$keyword}%");
            });
        }

        $prestasi = $query->latest()->paginate(10)->withQueryString();

        return view('prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        return view('prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'tingkat'       => 'required|string|max:30',
            'juara'         => 'nullable|string|max:30',
            'tahun'         => 'nullable|digits:4',
            'deskripsi'     => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/prestasi'), $filename);
            $data['foto'] = $filename;
        }

        Prestasi::create($data);

        return redirect()->route('prestasi.index')
                         ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasi.show', compact('prestasi'));
    }

    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:100',
            'tingkat'       => 'required|string|max:30',
            'juara'         => 'nullable|string|max:30',
            'tahun'         => 'nullable|digits:4',
            'deskripsi'     => 'nullable|string',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($prestasi->foto && file_exists(public_path('uploads/prestasi/' . $prestasi->foto))) {
                unlink(public_path('uploads/prestasi/' . $prestasi->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/prestasi'), $filename);
            $data['foto'] = $filename;
        }

        $prestasi->update($data);

        return redirect()->route('prestasi.index')
                        ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->foto && file_exists(public_path('uploads/prestasi/' . $prestasi->foto))) {
            unlink(public_path('uploads/prestasi/' . $prestasi->foto));
        }

        $prestasi->delete();

        return redirect()->route('prestasi.index')
                        ->with('success', 'Prestasi berhasil dihapus.');
    }
}