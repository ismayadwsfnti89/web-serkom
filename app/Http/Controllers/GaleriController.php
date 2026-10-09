<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('kategori', 'like', "%{$keyword}%")
                  ->orWhere('keterangan', 'like', "%{$keyword}%");
            });
        }

        $galeri = $query->latest()->paginate(10)->withQueryString();

        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $kategori = $request->kategori;

        // Validasi beda sesuai kategori
        if ($kategori === 'Foto') {
            $request->validate([
                'judul'     => 'required|string|max:50',
                'kategori'  => 'required|in:Foto,Video',
                'file_foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
                'tanggal'   => 'nullable|date',
            ]);
        } else {
            $request->validate([
                'judul'      => 'required|string|max:50',
                'kategori'   => 'required|in:Foto,Video',
                'link_video' => 'required|url',
                'tanggal'    => 'nullable|date',
            ]);
        }

        $data = [
            'id_galeri'  => Str::uuid(),
            'judul'      => $request->judul,
            'kategori'   => $kategori,
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan,
        ];

        // Kalau Foto → upload file
        if ($kategori === 'Foto' && $request->hasFile('file_foto')) {
            $file = $request->file('file_foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $filename);
            $data['file'] = $filename;
        }

        // Kalau Video → simpan link YouTube
        if ($kategori === 'Video') {
            $data['file'] = $request->link_video;
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')
                        ->with('success', 'Galeri berhasil ditambahkan.');
    }
    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $galeri = Galeri::findOrFail($id);
        return view('galeri.show', compact('galeri'));
    }

    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $galeri = Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $galeri = Galeri::findOrFail($id);

        $kategori = $request->kategori;

        if ($kategori === 'Foto') {
            $request->validate([
                'judul'     => 'required|string|max:50',
                'kategori'  => 'required|in:Foto,Video',
                'file_foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'tanggal'   => 'nullable|date',
            ]);
        } else {
            $request->validate([
                'judul'      => 'required|string|max:50',
                'kategori'   => 'required|in:Foto,Video',
                'link_video' => 'required|url',
                'tanggal'    => 'nullable|date',
            ]);
        }

        $data = [
            'judul'      => $request->judul,
            'kategori'   => $kategori,
            'tanggal'    => $request->tanggal,
            'keterangan' => $request->keterangan,
        ];

        // Kalau Foto → upload file baru kalau ada
        if ($kategori === 'Foto' && $request->hasFile('file_foto')) {
            if ($galeri->file && file_exists(public_path('uploads/galeri/' . $galeri->file))) {
                unlink(public_path('uploads/galeri/' . $galeri->file));
            }

            $file = $request->file('file_foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $filename);
            $data['file'] = $filename;
        }

        // Kalau Video → simpan link YouTube
        if ($kategori === 'Video') {
            $data['file'] = $request->link_video;
        }

        $galeri->update($data);

        return redirect()->route('galeri.index')
                        ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $galeri = Galeri::findOrFail($id);

        if ($galeri->file && file_exists(public_path('uploads/galeri/' . $galeri->file))) {
            unlink(public_path('uploads/galeri/' . $galeri->file));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')
                        ->with('success', 'Galeri berhasil dihapus.');
    }
}
