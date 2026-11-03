<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login khusus OPD
     */
    public function loginOpd(Request $request)
    {
        return $this->authenticate($request, 'opd');
    }

    /**
     * Login khusus Petugas
     */
    public function loginPetugas(Request $request)
    {
        return $this->authenticate($request, 'petugas');
    }

    /**
     * Proses autentikasi berdasarkan role
     */
    private function authenticate(Request $request, string $role)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Memeriksa kesesuaian role akun
            if ($user->role !== $role) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()
                    ->withErrors([
                        'email' => 'Akun tidak sesuai dengan halaman login yang dipilih.',
                    ])
                    ->onlyInput('email');
            }

            // Memperbarui session setelah login berhasil
            $request->session()->regenerate();

            // Mengarahkan pengguna sesuai role
            if ($role === 'petugas') {
                return redirect()->route('prototype.petugas');
            }

            return redirect()->route('prototype.opd');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau kata sandi salah.',
            ])
            ->onlyInput('email');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pilih-login');
    }
}
