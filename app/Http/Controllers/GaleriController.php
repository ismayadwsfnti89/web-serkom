<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

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

        $galeri = $query->latest()->paginate(12)->withQueryString();

        return view('galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'file'       => 'required|file|mimes:jpg,jpeg,png,gif,mp4,avi,mov|max:10240',
            'kategori'   => 'required|in:Foto,Video',
            'tanggal'    => 'nullable|date',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $filename);
            $data['file'] = $filename;
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')
                         ->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul'      => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'file'       => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,avi,mov|max:10240',
            'kategori'   => 'required|in:Foto,Video',
            'tanggal'    => 'nullable|date',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            if ($galeri->file && file_exists(public_path('uploads/galeri/' . $galeri->file))) {
                unlink(public_path('uploads/galeri/' . $galeri->file));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $filename);
            $data['file'] = $filename;
        }

        $galeri->update($data);

        return redirect()->route('galeri.index')
                         ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->file && file_exists(public_path('uploads/galeri/' . $galeri->file))) {
            unlink(public_path('uploads/galeri/' . $galeri->file));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')
                         ->with('success', 'Galeri berhasil dihapus.');
    }
}