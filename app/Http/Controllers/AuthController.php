<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Registrasi akun OPD
     */
    public function registerOpd(Request $request)
    {
        $validated = $request->validate([
            'nama_instansi' => [
                'required',
                'string',
                'max:200',
            ],
            'nama_penanggung_jawab' => [
                'required',
                'string',
                'max:150',
            ],
            'nip' => [
                'required',
                'string',
                'max:30',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        DB::transaction(function () use ($validated) {
            $opd = Opd::create([
                'nama_opd' => $validated['nama_instansi'],
                'nama_penanggung_jawab' =>
                    $validated['nama_penanggung_jawab'],
                'nip' => $validated['nip'],
                'email' => $validated['email'],
            ]);

            User::create([
                'name' => $validated['nama_penanggung_jawab'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => 'opd',
                'opd_id' => $opd->id,
            ]);
        });

        return redirect()
            ->route('login.opd')
            ->with(
                'success',
                'Pendaftaran berhasil. Silakan login menggunakan email dan password.'
            );
    }

    /**
     * Registrasi akun Petugas Diskominfotik
     */
    public function registerPetugas(Request $request)
    {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:150',
            ],
            'nip' => [
                'required',
                'string',
                'max:30',
                'unique:users,nip',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'nip.unique' => 'NIP tersebut sudah terdaftar.',
            'email.unique' => 'Email tersebut sudah digunakan.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        User::create([
            'name' => $validated['nama'],
            'nip' => $validated['nip'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'petugas',
            'opd_id' => null,
        ]);

        return redirect()
            ->route('login.petugas')
            ->with(
                'success',
                'Pendaftaran akun petugas berhasil. Silakan login menggunakan email dan password.'
            );
    }

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

            $request->session()->regenerate();

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
