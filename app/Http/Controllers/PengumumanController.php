<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller Pengumuman.
 *
 * Mengelola CRUD pengumuman sekolah.
 * Hanya pengumuman berstatus "Publish" yang tampil di halaman publik.
 *
 * @author  [Nama Kamu]
 * @version 1.0
 * @date    2026-10-09
 */
class PengumumanController extends Controller
{
    /**
     * Menampilkan daftar pengumuman.
     */
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

    /**
     * Menampilkan form tambah pengumuman.
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Menyimpan pengumuman baru.
     *
     * ID user yang bikin pengumuman disimpan otomatis.
     */
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

    /**
     * Menampilkan detail pengumuman.
     */
    public function show(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $pengumuman = Pengumuman::with('user')->findOrFail($id);
        return view('pengumuman.show', compact('pengumuman'));
    }

    /**
     * Menampilkan form edit pengumuman.
     */
    public function edit(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Memperbarui data pengumuman.
     */
    public function update(Request $request, string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
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

    /**
     * Menghapus pengumuman.
     */
    public function destroy(string $encryptedId)
    {
        $id = decrypt_id($encryptedId);
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
                        ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
