<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\SPP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    // menampilkan halaman tambah tranasaksi
    public function showTransaksi()
    {
        $siswa = Siswa::orderBy('nisn', 'ASC')->get();
        $spp = SPP::orderBy('id_spp', 'ASC')->get();
        return view('crud.transaksi', [
            'siswa' => $siswa,
            'spp' => $spp,
        ]);
    }

    // insertTransaksi
    public function insertTransaksi(Request $request)
    {
        $request->validate([
            'bulan_bayar' => 'required|max:8',
            'tahun_bayar' => 'required|max:4',
        ], [
            'bulan_bayar' => 'Nama bulan tidak boleh dari 8 karakter *("SEPTEMBER, NOVEMBER")',
            'tahun_bayar' => 'Format tahun tidak boleh dari 4 karakter *("10290190219")',
        ]);

        $pembayaran = new Pembayaran();
        $pembayaran->id_petugas = Auth::guard('admin')->user()->id_petugas;
        $pembayaran->nisn = $request->nama_siswa;
        $pembayaran->tgl_bayar = $request->tanggal_bayar;
        $pembayaran->bulan_bayar = $request->bulan_bayar;
        $pembayaran->tahun_bayar = $request->tahun_bayar;
        $pembayaran->id_spp = $request->spp;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->save();

        if ($pembayaran) {
            return redirect('/laporan')->with('toast_success', 'Berhasil menambahkan transaksi');
        }
        return redirect()->back()->with('toast_error', 'Gagal menambahkan transaksi');
    }
}
