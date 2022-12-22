<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\SO\InApotek;
use App\Models\SO\InGudang;
use App\Models\SO\OutApotek;
use App\Models\SO\OutGudang;
use App\Models\SO\OutGudangFinal;
use App\Models\SO\SoApotek;
use App\Models\SO\SoGudang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoGudangController extends Controller
{

    public function __construct()
    {
     $this->middleware('auth');
    }
    
    public function index()
    {
        $now = Carbon::now()->addDays(3);
        $data['gudang'] = SoGudang::whereDate('expired' ,'>', $now->toDateString())->paginate(50);
        $data['og'] = InGudang::all();
        return view('Unit.Gudang.v_gudang',$data);
    }
    public function Kirim(Request $request )
    {
       $data = new OutGudangFinal();
       $data->nama_obat = $request->nama_obat;
       $data->jumlah = $request->jumlah;
       $data->penerima = $request->penerima;
       $data->kadaluarsa = $request->kadaluarsa;
       $data->tanggal_keluar = $request->tanggal_keluar;
       

       $data->save();

    //    dd($data->toArray());

    DB::table('out_gudangs')
    ->where('id_obat', $request->id_obat)
    ->delete();
   

       $notification = array(
        'message' => 'Obat Sudah Di validasi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = new SoGudang();
        $data->name = $request->name;
        $data->batch = $request->batch;
        $data->jumlah = $request->jumlah;
        $data->expired = $request->expired;
        $data->save();

        $in = new InGudang();
        $in->name = $request->name;
        $in->batch = $request->batch;
        $in->jumlah = $request->jumlah;
        $in->expired = $request->expired;
        $in->save();

        $notification = array(
            'message' => 'Pasien Baru Telah Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('gudang.index')->with($notification);
    }

    public function PengeluaranObat(Request $request)
    {

        $notification = array(
            'message' => 'Barang Keluar Telah Di Entry',
            'alert-type' => 'success'
        );
        $notifer = array(
            'message' => 'Jumlah Barang Keluar Melebihi Stok',
            'alert-type' => 'warning'
        );
        $data = New OutGudang();
        $data->id_obat = $request->id_obat;
        $data->penerima = $request->penerima;
        $data->jumlah_keluar = $request->jumlah_keluar;
       
        
        $obat = SoGudang::find($request->id_obat);
        if ($obat->jumlah < $request->jumlah_keluar)
        {
            return redirect()->back()->with($notifer);
        }else{
            $obat->jumlah -= $request->jumlah_keluar;
            // $obat->save();  
        if( $data->penerima = 'Apotek'){
            $i = 0;
           
            $apotek = new InApotek();
            $apotek->id_obat = $request->id_obat;
            $apotek->jumlah = $request->jumlah_keluar;
            // $apotek->save();
     
            $farmasi = new SoApotek();
            $farmasi->id_obat = $request->id_obat;
            $farmasi->jumlah = $request->jumlah_keluar;

            $data->save();
            $farmasi->save();
            $obat->save();  
            $apotek->save();
           
            return redirect()->back()->with($notification);
        }else{
           
            return redirect()->back()->with($notification);
        }


           
        }
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
        //
    }

    public function destroy(Request $request ,$id)
    {
        $gd = SoGudang::find($id);
        InApotek::where('id_obat',$id)->delete();
        OutApotek::where('id_obat',$id)->delete();
        OutGudang::where('id_obat',$id)->delete();
        $gd->delete();

        $notification = array(
            'message' => 'Obat Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
   
}
