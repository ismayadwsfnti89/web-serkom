<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::with('user');

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('isi', 'like', "%{$keyword}%")
                  ->orWhere('status', 'like', "%{$keyword}%");
            });
        }

        $pengumuman = $query->latest()->paginate(10)->withQueryString();

        return view('pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'status'  => 'required|in:Publish,Draft',
        ]);

        $data = $request->all();
        $data['id_user'] = Auth::id();

        Pengumuman::create($data);

        return redirect()->route('pengumuman.index')
                         ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::with('user')->findOrFail($id);
        return view('pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:50',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
            'status'  => 'required|in:Publish,Draft',
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('pengumuman.index')
                         ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
                         ->with('success', 'Pengumuman berhasil dihapus.');
    }
}