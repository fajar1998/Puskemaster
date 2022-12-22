<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\PasienMaster;
use App\Models\RekmedMaster;
use App\Models\RekmedPengobatan;
use App\Models\SO\InApotek;
use App\Models\SO\OutApotek;
use App\Models\SO\SoApotek;
use App\Models\SoApotekFinal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FarmasiController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    public function Get_Obat(Request $request)
    {
      if($request->get('query'))
      {
        $query = $request->get('query');
        $data = SoApotek::where('name','like',"%".$query."%")->get();
        $hasil = '<ul class="dropdown-menu" style="display: block; position:relative;width:100%;">';
    
        foreach($data as $row)
        {
            $hasil .='
            <li><a href="#" class="dropdown-item">'.$row->name.'</a></li>
            ';

        }
        $hasil .= '</select>';
        echo $hasil;
      }
    }
    
    public function index()
    {
        $data ['show'] = PasienMaster::where('stats','Berobat')->paginate(50);
        return view('Unit.Farmasi.Play.v_farmasi',$data);
    }

   

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Pasien Telah Di Layani ',
            'alert-type' => 'success'
        );

        $notifer = array(
            'message' => 'Jumlah Barang Keluar Melebihi Stok',
            'alert-type' => 'warning'
        );

        $obat = $request->id_obat;
        if ($obat != NULL) {
            for ($i = 0; $i < count($obat); $i++) {
        $data = new RekmedPengobatan();
        $data->id_pasien = (int)$request->id_pasien;
        $data->id_obat = (int)$request->id_obat[$i];
        $data->jumlah_obat = (int)$request->jumlah_obat[$i];
      

        $pasien = PasienMaster::find($request->id_pasien);
        $pasien ->stats = 'Sudah Pulang';
        $pasien ->status_farmasi = '2';
        //  dd($request->all());
       
        $xpotek = new OutApotek();
        $xpotek->id_obat = (int)$request->id_obat[$i];
        $xpotek->jumlah_keluar = (int)$request->jumlah_obat[$i];
        $xpotek->penerima = 'Pasien';

        $apotek = SoApotekFinal::find((int)$request->id_obat[$i]);
        if ($apotek->jumlah < (int)$request->jumlah_obat[$i])
        {
            return redirect()->back()->with($notifer);
        }else{
            $apotek->jumlah -= (int)$request->jumlah_obat[$i];
           
            
        }
        
        $xpotek->save();
        $pasien->save();
        $data->save();
        $apotek->save();
    }}

    // $soap = $request->id_obat;
    // if ($soap != NULL) {
    //     for ($i = 0; $i < count($soap); $i++) {
        
    // }}
   
       
        return redirect()->back()->with($notification);
    }

    
    public function show($id)
    {
        //
    }


   
    public function edit($id)
    {
        $now = Carbon::now()->addDays(3);
        $data['obat'] = SoApotekFinal::whereDate('expired' ,'>', $now->toDateString())->orderBy('name','asc')->get();
        $data['pasien'] = PasienMaster::find($id);
        return view('Unit.Farmasi.Play.pengobatan',$data);
    }



   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
