<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class CrudKelasController extends Controller
{
    // showCrudKelas 
    public function showCrudKelas()
    {
        $kelas = Kelas::orderBy('id_kelas', 'DESC')->get();
        return view('crud.kelas.kelas_show', compact('kelas'));
    }

    // showCreateKelas
    public function showCreateKelas()
    {
        return view('crud.kelas.kelas_tambah');
    }

    // CreateKelas
    public function CreateKelas(Request $request)
    {
        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();

        if ($kelas) {
            return redirect('/kelas')->with('toast_success', 'Berhasil menambahkan kelas');
        }
        return redirect()->back()->with('toast_error', 'Gagal menambahkan kelas');
    }

    // showUpdateKelas
    public function showUpdateKelas($id_kelas)
    {
        $kelas = Kelas::select('*')->where('id_kelas', $id_kelas)->get();
        return view('crud.kelas.kelas_ubah', ['kelas' => $kelas]);
    }

    // update kelas ke database
    public function UpdateKelas(Request $request, $id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->update();

        if ($kelas) {
            return redirect('/kelas')->with('toast_success', 'Berhasil Mengubah data');
        }
        return redirect()->back()->with('toast_error', 'Gagal mengubah kelas');
    }

    // menghapus data kelas
    public function hapusKelas($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        $kelas->delete();

        if ($kelas) {
            return redirect('/kelas')->with('toast_success', 'Berhasil menghapus data');
        }
        return redirect()->back()->with('toast_error', 'Gagal menghapus kelas');
    }
}
