<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class CrudPetugasController extends Controller
{
    // show crudpetugas
    public function showCrudPetugas()
    {
        $petugas = Petugas::orderBy('id_petugas', 'DESC')->get();
        return view('crud.petugas.petugas_show', compact('petugas'));
    }

    // showCreatePetugas
    public function showCreatePetugas()
    {
        return view('crud.petugas.petugas_tambah');
    }

    // menambahkan data petugas ke dalam petugas
    public function CreatePetugas(Request $request)
    {
        $petugas = new Petugas();
        $petugas->username = $request->username;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->password = bcrypt($request->password);
        $petugas->level = $request->level;
        $petugas->save();

        if ($petugas) {
            return redirect('/petugas')->with('toast_success', 'Berhasil menambahkan petugas');
        }
        return redirect()->back()->with('toast_error', 'Gagal menambahkan petugas');
    }

    // menampilkan halaman ubah data
    public function showUbahPetugas($id_petugas)
    {
        $petugas = Petugas::find($id_petugas);
        return view('crud.petugas.petugas_ubah', compact('petugas'));
    }

    // mengubah data petugas ke database
    public function ubahPetugas(Request $request, $id_petugas)
    {
        $petugas = Petugas::find($id_petugas);
        $petugas->username = $request->username;
        $petugas->nama_petugas = $request->nama_petugas;

        if ($request->password) {
            $petugas->password = bcrypt($request->password);
        }

        $petugas->level = $request->level;
        $petugas->update();

        if ($petugas) {
            return redirect('/petugas')->with('toast_success', 'Berhasil mengubah petugas');
        }
        return redirect()->back()->with('toast_error', 'Gagal mengubah petugas');
    }

    // menghapus data petugas
    public function hapusPetugas($id_petugas)
    {
        $petugas = Petugas::find($id_petugas);
        $petugas->delete();

        if ($petugas) {
            return redirect()->back()->with('toast_success', 'Berhasil menghapus petugas');
        }

        return redirect()->back()->with('toast_error', 'Gagal menghapus petugas');
    }
}
