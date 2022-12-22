<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\SO\InApotek;
use App\Models\SO\OutApotek;
use App\Models\SO\SoApotek;
use App\Models\SO\SoGudang;
use App\Models\SoApotekFinal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoApotekController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
   
    public function index()
    {
        $data['notif'] = SoApotekFinal::whereBetween('expired', [Carbon::now(), Carbon::now()->addDays(30)])->get();
        $data['total_notif'] = SoApotekFinal::whereBetween('expired', [Carbon::now(), Carbon::now()->addDays(7)])->count();

        $now = Carbon::now()->addDays(3);
        $data['ap'] = SoApotekFinal::whereDate('expired' ,'>', $now->toDateString())->orderby('jumlah','desc')->paginate(10);
        $data['obat'] = SoApotekFinal::whereDate('expired' ,'>', $now->toDateString())->get();

        
        return view('Unit.Farmasi.SO.v_so',$data);
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Obat Telah DiKeluarkan ',
            'alert-type' => 'success'
        );

        $notifer = array(
            'message' => 'Jumlah Obat Keluar Melebihi Stok',
            'alert-type' => 'warning'
        );

        $obat = $request->id_obat;
        if ($obat != NULL) {
            for ($i = 0; $i < count($obat); $i++) {
                $xpotek = new OutApotek();
                $xpotek->id_obat = (int)$request->id_obat[$i];
                $xpotek->jumlah_keluar = (int)$request->jumlah_obat[$i];
                $xpotek->penerima = 'Pegawai';
                $xpotek->petugas =   Auth::user()->name ;
               

                $apotek = SoApotekFinal::find((int)$request->id_obat[$i]);
                if ($apotek->jumlah < (int)$request->jumlah_obat[$i])
                {
                    return redirect()->back()->with($notifer);
                }else{
                    $apotek->jumlah -= (int)$request->jumlah_obat[$i];
                }
                
                $xpotek->save();
                $apotek->save();
                // dd($xpotek->toArray());
            }}
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
       
    }
}
