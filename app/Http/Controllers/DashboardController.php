<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // showDashboard

    public function showDashboard()
    {
        $siswa = Siswa::orderBy('nisn', 'DESC')->get();
        $kelas = Kelas::orderBy('id_kelas', 'DESC')->get();
        $pembayaran = Pembayaran::orderBy('id_pembayaran', 'DESC')->get();
        return view('dashboard', [
            'pembayaran' => $pembayaran,
            'siswa' => $siswa,
            'kelas' => $kelas,
        ]);
    }
}
