<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    
    public function index()
    {
        $data['alamat'] = Alamat::all();
        return view('Manajemen.Alamat.v_alamat',$data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Alamat Baru Telah Di Tambahkan ',
            'alert-type' => 'success'
        );

        $gagal = array(
            'message' => 'Alamat Sudah Ada',
            'alert-type' => 'warning'
        );

        $validateData = $request->validate([
            'nama_desa' => 'required|unique:alamats',
        ]);

        if ( !$validateData == true)
        {
            return redirect()->back()->with($gagal);
        }else{
            
            $data = new Alamat();
            $data->nama_desa = $request->nama_desa;
            $data->kode_desa = $request->kode_desa;
            $data->save();
    
            return redirect()->route('alamat.index')->with($notification);
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

        $gagal = array(
            'message' => 'Alamat Sudah Ada',
            'alert-type' => 'warning'
        );

        $validateData = $request->validate([
            'nama_desa' => 'required|unique:alamats',
        ]);

        if ( !$validateData == true)
        {
            return redirect()->back()->with($gagal);
        }else{
        $data = Alamat::find($id);
        $data->nama_desa = $request->nama_desa;
        $data->kode_desa = $request->kode_desa;
        $data->save();

        $notification = array(
            'message' => 'Desa Telah Di Perbarui ',
            'alert-type' => 'success'
        );

        return redirect()->route('alamat.index')->with($notification);
    }
    }

   
    public function destroy($id)
    {
        //
    }
}
