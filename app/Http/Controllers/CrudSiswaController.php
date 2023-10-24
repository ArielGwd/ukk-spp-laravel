<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CrudSiswaController extends Controller
{
    // showCrudSiswa
    public function showCrudSiswa()
    {
        $siswa = Siswa::orderBy('nisn', 'DESC')->get();
        return view('crud.siswa.siswa_show', compact('siswa'));
    }

    //  showCreateSiswa
    public function showCreateSiswa()
    {
        $kelas = Kelas::orderBy('id_kelas', 'ASC')->get();
        return view('crud.siswa.siswa_tambah', compact('kelas'));
    }

    // CreateSiswaa
    public function CreateSiswa(Request $request)
    {
        Session::flash('nisn', $request->nisn);
        Session::flash('nis', $request->nis);
        Session::flash('nama', $request->nama);
        Session::flash('no_telp', $request->no_telp);

        $request->validate([
            'nisn' => 'required|max:10|min:10',
            'nis' => 'required|max:8|min:8',
            'nama' => 'required|max:35|',
            'no_telp' => 'required|max:13|',
        ], [
            'nisn' => 'NISN tidak boleh kurang dari 10 dan lebih dari 10 angka',
            'nis' => 'NIS tidak boleh kurang dari 8 dan lebih dari 8 angka',
            'nama' => 'Nama tidak boleh dari 35 Karakter',
            'no_telp' => 'No Telepon tidak boleh dari 13 angka',
        ]);

        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->password = bcrypt($request->password);
        $siswa->id_kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = strval($request->no_telp);
        $siswa->save();

        if ($siswa) {
            return redirect('/siswa')->with('toast_success', 'Berhasil Menambahkan Siswa');
        }
        return redirect()->back()->with('toast_error', 'Gagal Menambahkan Siswa');
    }

    // showUbahSiswa
    public function showUbahSiswa($nisn)
    {
        $kelas = Kelas::orderBy('id_kelas', 'ASC')->get();

        $siswa = Siswa::find($nisn);
        return view('crud.siswa.siswa_ubah', [
            'kelas' => $kelas,
            'siswa' => $siswa,
        ]);
    }

    // mengubah data pada siswa  
    public function ubahSiswa(Request $request, $nisn)
    {
        $request->validate([
            'nisn' => 'required|max:10|min:10',
            'nis' => 'required|max:8|min:8',
            'nama' => 'required|max:35|',
            'no_telp' => 'required|max:13|',
        ], [
            'nisn' => 'NISN tidak boleh kurang dari 10 dan lebih dari 10 angka',
            'nis' => 'NIS tidak boleh kurang dari 8 dan lebih dari 8 angka',
            'nama' => 'Nama tidak boleh lebih dari 35 Karakter',
            'no_telp' => 'No Telepon tidak boleh lebih dari 13 angka',
        ]);

        $siswa = Siswa::find($nisn);
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;

        if ($request->password) {
            $siswa->password = bcrypt($request->password);
        }

        $siswa->id_kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = strval($request->no_telp);
        $siswa->update();

        if ($siswa) {
            return redirect('/siswa')->with('toast_success', 'Berhasil Mengubah Siswa');
        }
        return redirect()->back()->with('toast_error', 'Gagal Mengubah Siswa');
    }

    // menghapus data siswa
    public function hapusSiswa($nisn)
    {
        $siswa = Siswa::find($nisn);
        $siswa->delete();

        if ($siswa) {
            return redirect()->back()->with('toast_success', 'Berhasil Menghapus Siswa');
        }
        return redirect()->back()->with('toast_error', 'Gagal Menghapus Siswa');
    }
}
