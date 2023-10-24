<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CRUDSPPController extends Controller
{
    // showSPP
    public function showSPP()
    {
        $spp = SPP::orderBy('id_spp', 'DESC')->get();
        return view('crud.spp.spp_show', ['spp' =>  $spp]);
    }

    // menampilkan halaman tambah spp
    public function showCreateSPP()
    {
        return view('crud.spp.spp_tambah');
    }

    // menambahkan spp kedalam database
    public function CreateSPP(Request $request)
    {
        $request->validate([
            'tahun' => 'required|min:4|max:4',
            'nominal' => 'required|max:11',
        ], [
            'tahun' => 'Tahun tidak boleh kurang dan lebih dari 4 karakter',
            'nominal' => 'Nominal tidak boleh lebih dari 11 karakter',
        ]);

        $spp = new SPP();
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        if ($spp) {
            return redirect('/spp')->with('toast_success', 'Berhasil Menambahkan SPP');
        }
        return redirect()->back()->with('toast_error', 'Gagal Menambahkan SPP');
    }

    // showUbahSPP
    public function showUbahSPP($id_spp)
    {
        $spp = SPP::select('*')->where('id_spp', $id_spp)->first();
        return view('crud.spp.spp_ubah', compact('spp'));
    }

    // mengubah data spp pada database
    public function updateSPP(Request $request, $id_spp)
    {
        $spp = SPP::select('*')->where('id_spp', $id_spp)->first();
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->update();

        $request->validate([
            'tahun' => 'required|min:4|max:4',
            'nominal' => 'required|max:11',
        ], [
            'tahun' => 'Tahun tidak boleh kurang dan lebih dari 4 karakter',
            'nominal' => 'Nominal tidak boleh lebih dari 11 karakter',
        ]);

        if ($spp) {
            return redirect('/spp')->with('toast_success', 'Berhasil Mengubah SPP');
        }
        return redirect()->back()->with('toast_error', 'Gagal Mengubah SPP');
    }

    // menghapus data spp
    public function hapusSPP($id_spp)
    {
        $spp = SPP::find($id_spp);
        $spp->delete();

        if ($spp) {
            return redirect()->back()->with('toast_success', 'Berhasil Menghapus SPP');
        }
        return redirect()->back()->with('toast_error', 'Gagal Menghapus SPP');
    }
}
