<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Diagnosa;
use App\Models\PasienMaster;
use App\Models\RekamDiagnosa;
use App\Models\RekmedMaster;
use App\Models\RekmedPlay;
use App\Models\SO\InApotek;
use App\Models\SO\SoApotek;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekmedPlayController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
      
        $data ['show'] = PasienMaster::whereDate('updated_at', Carbon::today())->where('status','Rawat Jalan')->orderBy('no_antrian','asc')->get();
        return view('Unit.RM.Pelayanan.v_pasien',$data);
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = new RekamDiagnosa();
        $data->diagnosa = $request->diagnosa;
        $data->id_pasien = $request->id_pasien;
        $data->tanggal = $request->tanggal;
        $data->waktu = $request->waktu;
      
        $data->save();
       
        $notification = array(
            'message' => 'Diagnosa Telah Di Rekam',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $data['diag'] = RekamDiagnosa::where('id_pasien',$id)->get();
        $data['show'] = PasienMaster::find($id);
        $data['dg'] = Diagnosa::all();
        return view('Unit.RM.Pelayanan.entry',$data);
    }

    public function LoadDiagnosa(Request $request)
    {
        $data = Diagnosa::select('name')
                    ->where('name', 'LIKE', '%'. $request->get('query'). '%')
                    ->get();
     
        return response()->json($data);
    }

    public function loadObat(Request $request)
    {
      
        $data = SoApotek::select('name','jumlah')
        ->where('name', 'LIKE', '%'. $request->get('query'). '%')
        ->get();

         return response()->json($data);
    }

    public function StoreObat(Request $request)
    {
        $data = new RekamDiagnosa();
        $data->obat = $request->nama_obat;
        $data->id_obat = $request->id_obat;
      
      
        // $data->save();
        // dd($request->all());
        dd($data->toArray());
      

        $notification = array(
            'message' => 'Diagnosa Telah Di Rekam',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

 
    public function update(Request $request, $id)
    {
        $dgns = $request->id_diagnosa;
        if ($dgns != NULL) {
            for ($i = 0; $i < count($dgns); $i++) {
        // dd($request->all());  
       RekmedMaster::where('id_pasien', $id)
        ->update(['id_diagnosa' => 
        $request->id_diagnosa[$i]]);

       
            }}

        $notification = array(
            'message' => 'Riwayat Pemeriksaan telah Di Entry',
            'alert-type' => 'success'
        );

        return redirect()->route('rmplay.index')->with($notification);
    }

   
    public function destroy($id)
    {
        //
    }
}
