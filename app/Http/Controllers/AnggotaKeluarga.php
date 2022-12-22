<?php

namespace App\Http\Controllers;

use App\Models\PasienMaster;
use App\Models\StatusKK;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class AnggotaKeluarga extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
       
    }
    public function create()
    {
        //
    }
    public function Print_Card(Request $request)
    {
        $notification = array(
            'message' => 'Pasien Terbaru Belum Ada',
            'alert-type' => 'error'
        );
        $data['cetak'] = PasienMaster::where('no_rm_keluarga',$request->rm)->get();
     
        // dd($data->toArray());
       
        $customPaper = array(0,0,800,600);
        $pdf = FacadePdf::loadview('Unit.Pendaftaran.Anggota_keluarga.print_kb',$data)->setPaper($customPaper);
        return $pdf->stream('Gasskee.pdf');
    }

    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Anggota Baru Telah Di Tambahkan Sebagai Pasien ',
            'alert-type' => 'success'
        );

       $anggotaNew = new PasienMaster();
       $anggotaNew->nama_pasien = $request->nama;
       $anggotaNew->jenkel = $request->jenkel;
       $anggotaNew->tanggal_lahir = $request->tanggal_lahir;
       $anggotaNew->kepala_keluarga = $request->kepala_keluarga;
       $anggotaNew->desa_kode = $request->desa_kode;
       $anggotaNew->status_kode = $request->status_kk;
       $anggotaNew->dusun = $request->dusun;
       $anggotaNew->nik = $request->nik;
       $anggotaNew->no_bpjs = $request->no_bpjs;
       $anggotaNew->status = 'Mendaftar';
       $anggotaNew->umur = Carbon::parse($request->tanggal_lahir)->age;
       $anggotaNew->stats = 'Regist';

        $next_rm = $request->rm_sum;
        $desa = $request->desa_kode;

        $stats = $request->status_kk;
        $final  = $desa .$next_rm .$stats;
        $anggotaNew->no_rm = $final;


        $antri = PasienMaster::where('status','Rawat Jalan')->whereDate('updated_at', Carbon::today())->count();
        $next_antri = str_pad($antri + 1,2,'0',STR_PAD_LEFT);

        $anggotaNew->no_antrian = $next_antri;
        $anggotaNew->no_rm_keluarga = $request->no_rm_kel;
        $anggotaNew->rm_sum = $next_rm;

        $anggotaNew->save();
//    dd($anggotaNew->toArray());

   return redirect()->back()->with($notification);
//  =======================================================================================================================================================================
    
    }

    public function show(Request $request ,$id )
    {
        $rm = $request->rm;
        $data['kk'] = StatusKK::all();
        $data['show'] = PasienMaster::where('no_rm_keluarga',$rm)
        ->orderBy('status_kode','asc')
        ->get();
        return view('Unit.Pendaftaran.Anggota_Keluarga.show_anggota',$data);
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
       // $idp = $request->id_pasien;
       $data = PasienMaster::find($id);
       $data->ruang = $request->ruangan;
       $data->stats = 'Berobat';
       $data->status = 'Rawat Jalan';
       $data->status_farmasi = '1';

       $antri= PasienMaster::where('status','Rawat Jalan')->whereDate('updated_at', Carbon::today())->count();
       $next_antri = str_pad($antri + 1,2,'0',STR_PAD_LEFT);

       $data->no_antrian = $next_antri;

       $data->save();
    //    dd($data->toArray());
       $notification = array(
           'message' => 'Pasien Telah Di Entry ',
           'alert-type' => 'success'
       );

       return redirect()->route('pendaftaran.index')->with($notification);
    }

    public function destroy($id)
    {
        //
    }

    public function StoreAnggotaKeluarga(Request $request)
    {
       }

}
