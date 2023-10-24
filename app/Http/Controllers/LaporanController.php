<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // showLaporan
    public function showLaporan()
    {
        $pembayaran = Pembayaran::orderBy('id_pembayaran', 'DESC')->get();
        return view('laporan', ['pembayaran' => $pembayaran]);
    }

    // generateLaporan
    public function generateLaporan()
    {
        $pembayaran = Pembayaran::orderBy('id_pembayaran', 'DESC')->get();
        return view('generate_laporan', ['pembayaran' => $pembayaran]);
    }

    // laporanSiswa
    public function laporanSiswa($nisn)
    {
        $siswa = Siswa::find($nisn);
        $pembayaran = Pembayaran::orderBy('id_pembayaran', 'DESC')->get();
        return view('detail_siswa', [
            'siswa' => $siswa,
            'pembayaran' => $pembayaran,
        ]);
    }
}
