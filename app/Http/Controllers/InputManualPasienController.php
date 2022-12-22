<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\KepalaKeluarga;
use App\Models\PasienMaster;
use App\Models\StatusKK;
use Illuminate\Http\Request;

class InputManualPasienController extends Controller
{
    public function Index()
    {
        $data['alamat'] = Alamat::all();
        $data['kk'] = StatusKK::all();
        return view('inputmanual',$data);
    }

    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Pasien Telah Di Input',
            'alert-type' => 'success'
        );

        $kk = new KepalaKeluarga();
        $kk -> nama_kk = $request->nama_pasien;
        $kk -> desa_kode = $request->kode_desa;
       
        $data = new PasienMaster();
        $data->nama_pasien = $request->nama_pasien;
        $data->jenkel = $request->jenkel;
        $data->umur = $request->umur;
        $data->dusun = $request->dusun;
        $data->kepala_keluarga = $request->nama_pasien;
        $data->desa_kode = $request->kode_desa;
        $data->no_bpjs = $request->no_bpjs;
        $data->nik = $request->nik;
        $data->status_kode = '00';
        $data->status = 'Rawat Jalan';
        $data->nik = $request->nik;
        $data->stats = 'Sudah Pulang';
       
        $regist = $request->no_register;
    
       
       
        $desa = $request->kode_desa;
        $stats = '00';
        $final  = $desa .$regist .$stats;

        $data->no_rm = $final;
        $data->no_rm_keluarga = $final;
        $data->rm_sum = $regist;


        $data->save();
        $kk->save();

       
//    dd($request->all()); 


//    dd($data->toArray());


        return redirect()->back()->with($notification);
    }
}
