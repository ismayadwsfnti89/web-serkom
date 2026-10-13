<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('user');

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('isi', 'like', "%{$keyword}%")
                  ->orWhere('status', 'like', "%{$keyword}%");
            });
        }

        $berita = $query->latest()->paginate(10)->withQueryString();

        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        // Bikin slug otomatis dari judul
        $slug = Str::slug($request->judul);
        $request->merge(['slug' => $slug]);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'slug'    => 'required|unique:berita,slug',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'  => 'required|in:Publish,Draft',
        ]);

        $data = $request->except('gambar');
        $data['id_user'] = Auth::id();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $filename);
            $data['gambar'] = $filename;
        }

        Berita::create($data);

        return redirect()->route('berita.index')
                         ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $berita = Berita::with('user')->findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'  => 'required|in:Publish,Draft',
        ]);

        // Slug gak diubah saat update
        $data = $request->except(['gambar', 'slug']);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
                unlink(public_path('uploads/berita/' . $berita->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/berita'), $filename);
            $data['gambar'] = $filename;
        }

        $berita->update($data);

        return redirect()->route('berita.index')
                        ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && file_exists(public_path('uploads/berita/' . $berita->gambar))) {
            unlink(public_path('uploads/berita/' . $berita->gambar));
        }

        $berita->delete();

        return redirect()->route('berita.index')
                        ->with('success', 'Berita berhasil dihapus.');
    }
}
