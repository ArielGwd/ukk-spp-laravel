<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // showLoginAll
    public function showLoginAll()
    {
        return view('auth.login_all');
    }

    // show hal login siswa
    public function showLoginSiswa()
    {
        return view('auth.login_siswa');
    }

    // login brow
    public function loginSiswa(Request $request)
    {
        $credentials = $request->only('nis', 'password');

        if (Auth::guard('pelajar')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('toast_success', 'Berhasil Login');
        }

        return redirect()->back()->with('toast_error', 'Gagal Login');
    }

    // logout siswa
    public function logoutSiswa()
    {
        Auth::guard('pelajar')->logout();
        return redirect('/login/all')->with('toast_success', 'Berhasil Logout');
    }

    // show login Petugas
    public function showLogPetugas()
    {
        return view('auth.login_petugas');
    }

    // login petugas --------------------- //
    public function loginPetugas(Request $request)
    {
        $request->validate([
            'username' => 'required|alpha-dash',
            'password' => 'required|alpha-dash',
        ], [
            'username' => 'Username tidak boleh menggunakan tanda baca (<" !? ">)',
            'password' => 'Password tidak boleh menggunakan tanda baca (<" !? ">)',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('toast_success', 'Berhasil Login');
        }
        return redirect()->back()->with('toast_error', 'Gagal Login');
    }

    // logout Petugas
    public function logoutPetugas()
    {
        Auth::guard('admin')->logout();
        return redirect('/login/all')->with('toast_success', 'Berhasil Logout');
    }

    // error404
    public function error404()
    {
        return view('error404');
    }
}
