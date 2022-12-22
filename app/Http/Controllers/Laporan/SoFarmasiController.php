<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\InApotekFinal;
use App\Models\SO\InApotek;
use App\Models\SO\OutApotek;
use App\Models\SO\SoApotek;
use App\Models\SoApotekFinal;
use Illuminate\Http\Request;

class SoFarmasiController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    
    public function Kirim(Request $request)
    {
        $data = new SoApotekFinal();
        $data->name = $request->nama_obat;
        $data->jumlah = $request->jumlah;
        $data->batch = $request->batch;
        $data->expired = $request->kadaluarsa;
        $data->save();
        // dd($data->toArray());
        SoApotek::where('id_obat',$request->id_obat)->delete();

        $data = new InApotekFinal();
        $data->name = $request->nama_obat;
        $data->jumlah = $request->jumlah;
        $data->batch = $request->batch;
        $data->expired = $request->kadaluarsa;
        $data->save();
        // dd($data->toArray());
        InApotek::where('id_obat',$request->id_obat)->delete();

        $notification = array(
            'message' => 'Data Obat Telah DiKirim Ke So Farmasi',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
    public function index()
    {
        $data['apin'] = InApotek::all();
        return view('Laporan.SO.SO_Farmasi.v_so_farmasi',$data);
    }

    public function indexPengeluaran()
    {
        $data['outek'] = OutApotek::paginate(50);
        return view('Laporan.SO.SO_Farmasi.so_pengeluaran_apotek',$data);
    }



    public function SortWaktu(Request $request)
    {
        $tgl_start = date('Y-m-d',strtotime($request->start));
        $tgl_akhir = date('Y-m-d',strtotime($request->end));

  

        $tgl_akhir_final = date('Y-m-d H:i:s', strtotime($tgl_akhir . ' +1 day'));

        $filter = InApotekFinal::whereBetween('updated_at',[$tgl_start,$tgl_akhir_final])->get(); 

        if ($filter == true) {
            $data['apint'] = InApotekFinal::whereBetween('updated_at',[$tgl_start,$tgl_akhir_final])
            ->paginate(50); 
            return view('Laporan.SO.SO_Farmasi.hasil_sortir_penerimaan',$data);
        }else {
            $notification = array(
                'message' => 'Data Tidak Ditemukan',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        // dd($data);
        }
    }

    public function SortWaktuKeluar(Request $request)
    {
        $tgl_start = date('Y-m-d',strtotime($request->start));
        $tgl_akhir = date('Y-m-d',strtotime($request->end));

  

        $tgl_akhir_final = date('Y-m-d H:i:s', strtotime($tgl_akhir . ' +1 day'));

        $filter = OutApotek::whereBetween('updated_at',[$tgl_start,$tgl_akhir_final])->first(); 

        if ($filter == true) {
            $data['outek'] = OutApotek::whereBetween('updated_at',[$tgl_start,$tgl_akhir_final])
            ->paginate(20); 
            return view('Laporan.SO.SO_Farmasi.hasil_sortir_pengeluaran',$data);
        }else {
            $notification = array(
                'message' => 'Data Tidak Ditemukan',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        // dd($data);
        }
    }
    public function HapusPengeluaran($id)
    {
        $data = OutApotek::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Obat Telah DiHapussss',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
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

    public function destroy($id)
    {
        $data = InApotek::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Obat Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
