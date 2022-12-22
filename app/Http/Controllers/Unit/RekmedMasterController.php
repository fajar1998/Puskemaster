<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\KepalaKeluarga;
use App\Models\PasienMaster;
use App\Models\RawatInapFinal;
use App\Models\RekamDiagnosa;
use App\Models\RekmedMaster;
use App\Models\RekmedPengobatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;

class RekmedMasterController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function Print_Card($id)
    {
        $data['cetak'] = PasienMaster::find($id);
        $pdf = FacadePdf::loadview('Unit.RM.Data.tester',$data)->setPaper([0, 0, 226.772, 184.252]);
        return $pdf->stream('Gasskee.pdf');
    }
    
    public function index()
    {
        $data['rekdata'] = PasienMaster::orderBy('no_rm','asc')->paginate(10);
        $data['alamat'] = Alamat::all();
        $data['total'] = PasienMaster::all()->count();
        return view('Unit.RM.Data.v_data_master',$data);
    }
    public function Filter(Request $request)
    {
        $cari = $request->nama;
        // $data['rekdata'] = PasienMaster::paginate(50);
        $data['alamat'] = Alamat::all();
        $cekdata = PasienMaster::where('desa_kode',$request->alamat)->where('nama_pasien','like',"%".$cari."%")->get();

        if ($cekdata == true) {
        $data['data'] = PasienMaster::where('desa_kode',$request->alamat)->where('nama_pasien','like',"%".$cari."%")->paginate(10);
        return view('Unit.RM.Data.hasil_filter',$data);

        }else {
        $notification = array(
            'message' => 'Data Tidak Ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
       }
    }

    
    public function Cari(Request $request)
    {
        $data['total'] = PasienMaster::all()->count();
		$cari = $request->cari;
    $cekdata = PasienMaster::where('no_rm','like',"%".$cari."%")->orwhere('nama_pasien','like',"%".$cari."%")->first();

    if ($cekdata == true) {
        $data['alamat'] = Alamat::all();
        $data['rekdata'] = PasienMaster::where('no_rm','like',"%".$cari."%")->orwhere('nama_pasien','like',"%".$cari."%")->paginate(100);
        return view('Unit.RM.Data.v_data_master',$data);


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
        //
    }

    
    public function show($id)
    {



        $data['show'] = PasienMaster::find($id);
        $data['rwn'] = RawatInapFinal::where('id_pasien',$id)->get();

        $data['pengobatan'] = RekmedPengobatan::where('id_pasien',$id)->get();
         return view('Unit.RM.Data.show_data',$data);
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $pasien = PasienMaster::find($id);
        $pasien->nama_pasien = $request->nama;
        $pasien->nik = $request->nik;
        $pasien->no_bpjs = $request->bpjs;
        $pasien->tanggal_lahir = date('Y-m-d',strtotime($request->tgl_lahir));
        $pasien->jenkel = $request->jenkel;
        $pasien->kepala_keluarga = $request->kk;
        $pasien->umur = Carbon::parse(date('Y-m-d',strtotime($request->tgl_lahir)))->age;

        $pasien->save();
        // dd($pasien->toArray());

        $notification = array(
            'message' => 'Pasien Telah Perbarui',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function destroy(Request $request,$id)
    {
        $user = PasienMaster::find($id);
        $user->delete();
        KepalaKeluarga::where('nama_kk',$request->nama_pasien)->delete();

        $notification = array(
            'message' => 'Pasien Telah DiHapus',
            'alert-type' => 'warning'
        );


        return redirect()->back()->with($notification);
    }
}
