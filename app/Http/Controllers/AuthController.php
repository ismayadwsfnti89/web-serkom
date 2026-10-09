<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller Autentikasi.
 *
 * Menangani login, logout, dan halaman login.
 *
 * @author  [Nama Kamu]
 * @version 1.0
 * @date    2026-10-09
 */
class AuthController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * Kalau sudah login, langsung redirect ke dashboard.
     * Background login diambil acak dari galeri (kategori Foto).
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Ambil data profil sekolah untuk ditampilkan di halaman login
        $profil = ProfileSekolah::first();

        // Ambil 1 gambar random dari galeri (kategori Foto) buat background
        $galeriLogin = Galeri::where('kategori', 'Foto')
            ->inRandomOrder()
            ->first();

        return view('auth.login', compact('profil', 'galeriLogin'));
    }

    /**
     * Memproses login user.
     *
     * Initial state : Request dari form login
     * Final state   : Redirect ke dashboard (kalau berhasil)
     *                 atau balik ke form dengan error (kalau gagal)
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                             ->with('success', 'Selamat datang, ' . Auth::user()->nama . '.');
        }

        // Kalau gagal, balik ke form dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    /**
     * Logout user & hapus session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
                         ->with('success', 'Anda berhasil logout.');
    }
}
