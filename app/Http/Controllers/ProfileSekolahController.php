<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function edit()
    {
        $profil = ProfileSekolah::first();

        if (!$profil) {
            $profil = new ProfileSekolah();
        }

        return view('profile-sekolah.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|string|max:40',
            'kepala_sekolah' => 'nullable|string|max:40',
            'npsn'           => 'nullable|string|max:10',
            'alamat'         => 'nullable|string',
            'kontak'         => 'nullable|string|max:15',
            'visi_misi'      => 'nullable|string',
            'tahun_berdiri'  => 'nullable|digits:4',
            'deskripsi'      => 'nullable|string',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil = ProfileSekolah::first();

        if (!$profil) {
            $profil = new ProfileSekolah();
        }

        $data = $request->except(['foto', 'logo']);

        if ($request->hasFile('foto')) {
            if ($profil->foto && file_exists(public_path('uploads/profil/' . $profil->foto))) {
                unlink(public_path('uploads/profil/' . $profil->foto));
            }

            $file = $request->file('foto');
            $filename = 'foto_' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profil'), $filename);
            $data['foto'] = $filename;
        }

        if ($request->hasFile('logo')) {
            if ($profil->logo && file_exists(public_path('uploads/profil/' . $profil->logo))) {
                unlink(public_path('uploads/profil/' . $profil->logo));
            }

            $file = $request->file('logo');
            $filename = 'logo_' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profil'), $filename);
            $data['logo'] = $filename;
        }

        $profil->fill($data);
        $profil->save();

        return redirect()->route('profil.edit')
                         ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}