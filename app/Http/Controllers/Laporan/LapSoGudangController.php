<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\SO\InGudang;
use App\Models\SO\OutGudang;
use App\Models\SO\OutGudangFinal;
use Illuminate\Http\Request;

class LapSoGudangController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function Index_Pengeluaran()
    {
        $data['out'] = OutGudang::paginate(10);
        return view('Laporan.SO.SO_Gudang.so_pengeluaran',$data);
    }

    public function Index_Penerimaan()
    {
        $data['in'] = InGudang::all();
        return view('Laporan.SO.SO_Gudang.so_penerimaan',$data);
    }
    public function FilterPenerimaan(Request $request)
    {
        $tgl_start = date('Y-m-d',strtotime($request->start));
        $tgl_akhir = date('Y-m-d',strtotime($request->end));
        $tgl_akhir_final = date('Y-m-d H:i:s', strtotime($tgl_akhir . ' +1 day'));

        $filter = InGudang::whereBetween('updated_at',[$tgl_start,$tgl_akhir_final])->first(); 

        if ($filter == true) {
            $data['gdt'] = InGudang::whereBetween('updated_at',[$tgl_start,$tgl_akhir_final])
            ->get(); 
            return view('Laporan.SO.SO_Gudang.hasil_filter_penerimaan',$data);
        }else {
            $notification = array(
                'message' => 'Data Tidak Ditemukan',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
    }
        }
    public function Filter(Request $request)
    {
       
        $tgl_start = date('Y-m-d',strtotime($request->start));
        $tgl_akhir = date('Y-m-d',strtotime($request->end));
        $tgl_akhir_final = date('Y-m-d H:i:s', strtotime($tgl_akhir . ' +1 day'));

        $filter = OutGudangFinal::whereBetween('tanggal_keluar',[$tgl_start,$tgl_akhir_final])->first(); 

        if ($filter == true) {
            $data['gdt'] = OutGudangFinal::whereBetween('tanggal_keluar',[$tgl_start,$tgl_akhir_final])
            ->get(); 
            return view('Laporan.SO.SO_Gudang.hasil_filter_pengeluaran',$data);
        }else {
            $notification = array(
                'message' => 'Data Tidak Ditemukan',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        // dd($data);
        }
    }
    public function Hapus($id)
    {
        $user = OutGudang::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Obat Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function HapusFinal($id)
    {
        $user = OutGudangFinal::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Obat Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function HapusPenerimaan($id)
    {
        $user = InGudang::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Obat Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    
}
