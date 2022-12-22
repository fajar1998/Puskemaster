<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Diagnosa;
use App\Models\Keluarga;
use App\Models\KepalaKeluarga;
use App\Models\PasienMaster;
use App\Models\StatusKK;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PendaftaranController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function autoPasien(Request $request)
    {
        $data = PasienMaster::select("no_rm_keluarga")
        ->where('no_rm_keluarga', 'LIKE', '%'. $request->get('query'). '%')
        ->get();
        return response()->json($data);
    }
   
    public function index()
    {
        $data['alamat'] = Alamat::all();
        $data['kk'] = StatusKK::all();
        return view('Unit.Pendaftaran.v_pendaftaran',$data);
    }

    public function Cari(Request $request)
    {
        $cari = $request->cari;
        $cekdata = PasienMaster::where('no_rm_keluarga',$cari)->orwhere('kepala_keluarga','like',"%".$cari."%")->first();
        if ($cekdata == true) {

            $data['pasien_rm'] =  PasienMaster::where('no_rm_keluarga',$cari)
            ->orwhere('kepala_keluarga','like',"%".$cari."%")
            ->groupBy('kepala_keluarga')
            ->get();
          
            // dd($data);

            return view('Unit.Pendaftaran.v_pasien_lama',$data);
            }else {
            $notification = array(
                'message' => 'Pasien Tidak Ditemukan',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

  
    public function create()
    {
        //
    }

    public function Print_Card()
    {

        $notification = array(
            'message' => 'Pasien Terbaru Belum Ada',
            'alert-type' => 'error'
        );

        $data['cetak'] = PasienMaster::whereDate('created_at', Carbon::today())->orderBy('created_at','desc')->get();
        if ($data['cetak']->count() === 0) { 
            return redirect()->back()->with($notification);
         } 
        $customPaper = array(0,0,800,600);
        $pdf = FacadePdf::loadview('Unit.Pendaftaran.print_kartu_berobat',$data)->setPaper($customPaper);
        return $pdf->stream('Gasskee.pdf');
    }

    public function store(Request $request)
    {
      
        $notification = array(
            'message' => 'Pasien Baru Telah Di Tambahkan ',
            'alert-type' => 'success'
        );

        $kk = new KepalaKeluarga();
        $kk -> nama_kk = $request->nama_pasien;
        $kk -> desa_kode = $request->kode_desa;
       
        $data = new PasienMaster();
        $data->nama_pasien = $request->nama_pasien;
        $data->jenkel = $request->jenkel;
        $data->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
        $data->ruang = $request->ruang;
        $data->umur = Carbon::parse($request->tanggal_lahir)->age;
        $data->dusun = $request->dusun;
        $data->kepala_keluarga = $request->kepala_keluarga;
        $data->desa_kode = $request->kode_desa;
        $data->status_kode = $request->status_kk;
        $data->no_bpjs = $request->no_bpjs;
        $data->pembayaran = $request->pembayaran;
        $data->status = 'Rawat Jalan';
        $data->nik = $request->nik;
        $data->stats = 'Berobat';
        
    
        // $rmnew = PasienMaster::where('desa_kode', $request->kode_desa)->groupBy('desa_kode')->count();
        $rmnew = KepalaKeluarga::where('desa_kode', $request->kode_desa)->groupBy('desa_kode')->count();
        
       
        $next_rm = str_pad($rmnew + 1,4,'0',STR_PAD_LEFT);
        // $next_rm = $request->rm_sum;
        $desa = $request->kode_desa;
        $stats = $request->status_kk;
        $final  = $desa .$next_rm .$stats;
        $data->no_rm = $final;
        $data->no_rm_keluarga = $final;
        $data->rm_sum = $next_rm;


        $antri= PasienMaster::where('status','Rawat Jalan')->whereDate('updated_at', Carbon::today())->count();
        $next_antri = str_pad($antri + 1,2,'0',STR_PAD_LEFT);

        $data->no_antrian = $next_antri;
        $data->save();
        $kk->save();
        // $kepala->save();

       
//    dd($request->all()); 


//    dd($data->toArray());


        return redirect()->back()->with($notification);
    }

   
   

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        //
    }

   

  
}