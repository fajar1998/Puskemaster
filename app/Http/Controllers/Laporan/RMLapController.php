<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Diagnosa;
use App\Models\PasienMaster;
use App\Models\RekmedMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RMLapController extends Controller
{
    
    public function __construct()
    {

     $this->middleware('auth');
    }

    public function View()
    {
        $data['dg'] = Diagnosa::all();
        $data['alamat'] = Alamat::all();
         return view('Laporan.RM.v_lap_rm',$data);
    }

    public function Set(Request $request)
    {
       

        $id_diagnosa = $request->id_diagnosa;
        $bayar = $request->bayar;
        $jenkel = $request->jenkel;
        // $umur = $request->umur;
        $id_alamat = $request->id_alamat;

        $start_date = $request->start_date;
        $tgl_2 = $request->end_date;

        $tgl_akhir = date('Y-m-d H:i:s', strtotime($tgl_2 . ' +1 day'));

       

    	$filter = RekmedMaster::where('id_diagnosa',$id_diagnosa)
        ->where('jenkel',$jenkel)
        ->where('bayar',$bayar)
        ->where('id_alamat',$id_alamat)
        ->whereBetween('created_at',[$start_date,$tgl_akhir])
        ->first();

    if ($filter == true) {
    	$data['allData'] = RekmedMaster::select('id_pasien','id_diagnosa','created_at','bayar','jenkel')
        ->where('id_diagnosa',$id_diagnosa)
        ->where('jenkel',$jenkel)
        ->where('bayar',$bayar)
        ->where('id_alamat',$id_alamat)
        ->whereBetween('created_at',[$start_date,$tgl_akhir])
        ->groupBy('id_pasien')
        ->groupBy('id_diagnosa')
        ->groupBy('id_alamat')
        ->groupBy('created_at')
        ->groupBy('bayar')
        ->groupBy('jenkel')
        ->get(); 

        // if ($hasil == true) {
        //     $data['allData'] = RekmedMaster::select('id_pasien','id_diagnosa','created_at')
        //     ->where('id_diagnosa',$id_diagnosa)
        //     ->groupBy('id_pasien')
        //     ->groupBy('id_diagnosa')
        //     ->groupBy('created_at')
        //     ->get();

        
    	// dd($data['allData']->toArray());

        return view('Laporan.RM.testerFilter',$data);

        }else {

            // dd($request->all());
        $notification = array(
            'message' => 'Data Tidak Ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    
            }
    }

    public function TestFilt(Request $request)
    {
        # code...
    }
}
