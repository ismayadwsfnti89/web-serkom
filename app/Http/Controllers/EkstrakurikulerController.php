<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EkstrakurikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ekstrakurikuler::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_ekskul', 'like', "%{$keyword}%")
                  ->orWhere('pembina', 'like', "%{$keyword}%")
                  ->orWhere('jadwal_latihan', 'like', "%{$keyword}%");
            });
        }

        $ekskul = $query->latest()->paginate(10)->withQueryString();

        return view('ekstrakurikuler.index', compact('ekskul'));
    }

    public function create()
    {
        return view('ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        // Bikin slug otomatis dari nama ekskul
        $slug = Str::slug($request->nama_ekskul);
        $request->merge(['slug' => $slug]);

        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'slug'           => 'required|unique:ekstrakurikuler,slug',
            'pembina'        => 'nullable|string|max:40',
            'jadwal_latihan' => 'nullable|string|max:40',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ekskul'), $filename);
            $data['gambar'] = $filename;
        }

        Ekstrakurikuler::create($data);

        return redirect()->route('ekskul.index')
                         ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('ekstrakurikuler.show', compact('ekskul'));
    }

    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('ekstrakurikuler.edit', compact('ekskul'));
    }

    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $ekskul = Ekstrakurikuler::findOrFail($id);

        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'pembina'        => 'nullable|string|max:40',
            'jadwal_latihan' => 'nullable|string|max:40',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Slug gak diubah saat update
        $data = $request->except(['gambar', 'slug']);

        if ($request->hasFile('gambar')) {
            if ($ekskul->gambar && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar))) {
                unlink(public_path('uploads/ekskul/' . $ekskul->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ekskul'), $filename);
            $data['gambar'] = $filename;
        }

        $ekskul->update($data);

        return redirect()->route('ekskul.index')
                        ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $ekskul = Ekstrakurikuler::findOrFail($id);

        if ($ekskul->gambar && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar))) {
            unlink(public_path('uploads/ekskul/' . $ekskul->gambar));
        }

        $ekskul->delete();

        return redirect()->route('ekskul.index')
                        ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
