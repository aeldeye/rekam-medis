<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\Rekammedis;
use Illuminate\Http\Request;

class RekammedisController extends Controller
{
    public function index()
    {
        $rekammedis = Rekammedis::all();
        return view('rekammedis.rekammedis_index', ['rekammedis' => $rekammedis]);
    }

    public function create()
    {
        $poli = Poliklinik::all();
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('rekammedis.rekammedis_create', compact(['poli', 'pasien', 'dokter']));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
                'tgl_periksa' => 'required',
                'id_poli' => 'required',
                'id_pasien' => 'required',
                'keluhan' => 'required',
                'id_dokter' => 'required',
                'diagnosa' => 'required',
            ]
        );

        Rekammedis::create($request->all());
        if (auth()->user()->level == 1)
            return redirect('/admin/rekammedis/index')->with('pesan', 'Data sudah disimpan!');
        elseif (auth()->user()->level == 2)
            return redirect('/user/rekammedis/index')->with('pesan', 'Data sudah disimpan!');
    }

    public function edit($id)
    {
        $rekammedis = Rekammedis::findOrFail($id);
        $poli = Poliklinik::all();
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('rekammedis.rekammedis_edit', compact(['rekammedis', 'poli', 'pasien', 'dokter']));
    }

    public function update(Request $request, $id)
    {
        $rekammedis = Rekammedis::findOrFail($id);

        $validasi = $request->validate(
            [
                'tgl_periksa' => 'required',
                'id_poli' => 'required',
                'id_pasien' => 'required',
                'keluhan' => 'required',
                'id_dokter' => 'required',
                'diagnosa' => 'required',
            ]
        );

        $rekammedis->update($request->all());
        if (auth()->user()->level == 1)
            return redirect('/admin/rekammedis/index')->with('pesan', 'Data sudah diubah!');
        elseif (auth()->user()->level == 2)
            return redirect('/user/rekammedis/index')->with('pesan', 'Data sudah diubah!');
    }

    public function delete($id)
    {
        $rekammedis = Rekammedis::findOrFail($id);
        $rekammedis->delete();

        if (auth()->user()->level == 1)
            return redirect('/admin/rekammedis/index')->with('pesan', 'Data sudah dihapus!');
        elseif (auth()->user()->level == 2)
            return redirect('/user/rekammedis/index')->with('pesan', 'Data sudah dihapus!');
    }
}
