<?php

namespace App\Http\Controllers;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ekskul = Ekstrakurikuler::latest()->paginate(10);
        return view('ekstrakurikuler.index', compact('ekskul'));
    }

    public function create()
    {
        return view('ekstrakurikuler.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'pembina'        => 'nullable|string|max:40',
            'jadwal_latihan' => 'nullable|string|max:40',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('gambar');

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/ekskul'), $filename);
            $data['gambar'] = $filename;
        }

        Ekstrakurikuler::create($data);

        return redirect()->route('ekskul.index')
                         ->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('ekstrakurikuler.show', compact('ekskul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('ekstrakurikuler.edit', compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'pembina'        => 'nullable|string|max:40',
            'jadwal_latihan' => 'nullable|string|max:40',
            'deskripsi'      => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('gambar');

        // Upload gambar baru
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
                         ->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        if ($ekskul->gambar && file_exists(public_path('uploads/ekskul/' . $ekskul->gambar))) {
            unlink(public_path('uploads/ekskul/' . $ekskul->gambar));
        }

        $ekskul->delete();

        return redirect()->route('ekskul.index')
                         ->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}

