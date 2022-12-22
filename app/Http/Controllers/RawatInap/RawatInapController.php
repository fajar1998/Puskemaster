<?php

namespace App\Http\Controllers\RawatInap;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\KepalaKeluarga;
use App\Models\PasienMaster;
use App\Models\RawatInap;
use App\Models\RawatInapFinal;
use App\Models\StatusKK;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Rect;
use Symfony\Component\Console\Input\Input;

class RawatInapController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['alamat'] = Alamat::all();
        $data['kk'] = StatusKK::all();
        return view('RawatInap.Pendaftaran.v_reg_watnap',$data);
    }
    public function Menginap()
    {
        $data['pasien'] = RawatInap::where('status','Menginap')->get();
        return view('RawatInap.Menginap.v_pasien_menginap',$data);
    }

    public function Alihkan()
    {
        $data['alamat'] = Alamat::all();
        $data['kk'] = StatusKK::all();
        $data['pasien'] = PasienMaster::where('ruang','Rawat Inap')->get();
        return view('RawatInap.Pendaftaran.after_reg',$data);
    }

    public function Stores(Request $request)
    {
        RawatInap::where('id_pasien',$request->id_pas)->delete();
       
    		// $data_status = 'data_status'.$i;
    		$data = new RawatInap();
    		$data-> id_pasien = $request->id_pas;
    		$data-> nik = $request->nik;
            $data-> no_bpjs = $request->no_bpjs;
            $data-> tgl_masuk = $request->tgl_masuk;
            $data-> keluhan = $request->keluhan;
            $data-> ruang = $request->ruang;
            $data-> status = 'Menginap';
    		$data->save();

            $pasien = PasienMaster::find($request->id_pas);
            $pasien->rawat_inap = 'Y';
    		$pasien->save();


        // dd($data->toArray());
        $notification = array(
            'message' => 'Pasien Rawat Inap Telah Di Daftarkan ',
            'alert-type' => 'success'
        );
        return redirect()->route('watnap.index')->with($notification);
    }

    public function Data()
    {
        $data['pasien'] = PasienMaster::where('rawat_inap','Y')->paginate(30);
        $data['total'] = PasienMaster::where('rawat_inap','Y')->count();
        // $data['pasien'] = RawatInapFinal::all();
        return view('RawatInap.Data.v_data_watnap',$data);
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

            return view('RawatInap.Data.cari_pasien',$data);
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
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->ruang = 'Rawat Inap';
        $data->kepala_keluarga = $request->kepala_keluarga;
        $data->desa_kode = $request->kode_desa;
        $data->status_kode = $request->status_kk;
        $data->umur = Carbon::parse($request->tanggal_lahir)->age;
        $data->pembayaran = $request->pembayaran;
        $data->no_bpjs = $request->no_bpjs;
        $data->nik = $request->nik;
        $data->dusun = $request->dusun;
        $data->status = 'Rawat Inap';
        $data->stats = 'Menginap';
        
        $rmnew = KepalaKeluarga::where('desa_kode', $request->kode_desa)->groupBy('desa_kode')->count();
        
        $next_rm = str_pad($rmnew + 1,4,'0',STR_PAD_LEFT);
        
        $desa = $request->kode_desa;
        $stats = $request->status_kk;
        $final  = $desa .$next_rm .$stats;
        $data->no_rm = $final;
        $data->no_rm_keluarga = $final;
        $data->rm_sum = $next_rm;

       
        $data->save();
        $kk->save();  

       
//    dd($data->toArray()); 
// //    dd($idInap->toArray());


        return redirect()->route('watnap.alih')->with($notification);
    }

   
    public function show(Request $request,$id)
    {

        $data['show'] = PasienMaster::find($request->id_pasien);
        $data['wn'] = RawatInap::where('id_pasien',$request->id_pasien)->orderBy('created_at','desc')->first();
        $data['rwn'] = RawatInapFinal::where('id_pasien',$request->id_pasien)->get();
       
     
         return view('RawatInap.Data.detail_watnap',$data);
    }

   
    public function edit($id)
    {
        //
    }

    public function IsiPulang(Request $request)
    {
         $data = new RawatInapFinal();
         $data->id_pasien = $request->id_pasien;
         $data->keluhan = $request->keluhan;
         $data->tgl_masuk = $request->tgl_masuk;
         $data->tgl_keluar = $request->tgl_keluar;
         $data->diagnosa = $request->diagnosa;
         $data->keterangan_keluar = $request->ket;
        //  dd($data->toArray());
         $data->save();

        $pasien = RawatInap::where('id_pasien',$request->id_pasien)->first();
        $pasien ->status = 'Pulang';
        $pasien->save();
        //  dd($pasien->toArray());

 
         $notification = array(
             'message' => 'Pasien Rawat Telah Pulang',
             'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);

    }

    public function update(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
        //
    }
}
