<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\StatusKK;
use Illuminate\Http\Request;

class StatusKKController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
  
    public function index()
    {
        $data['kk'] = StatusKK::all();
        return view('Manajemen.StatKK.v_statkk',$data);
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Status Baru Telah Di Tambahkan ',
            'alert-type' => 'success'
        );

        $gagal = array(
            'message' => 'Status Sudah Ada',
            'alert-type' => 'warning'
        );

        $validateData = $request->validate([
            'name' => 'required|unique:status_k_k_s',
        ]);

        if ( !$validateData == true)
        {
            return redirect()->back()->with($gagal);
        }else{
            
            $data = new StatusKK();
            $data->name = $request->name;
            $data->kode_stats = $request->kode_stats;
            $data->save();
    
            return redirect()->route('statskk.index')->with($notification);
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
        $data = StatusKK::find($id);
        $data->name = $request->name;
        $data->kode_stats = $request->kode_stats;
        $data->save();

        $notification = array(
            'message' => 'Status KK Telah Di Perbarui ',
            'alert-type' => 'success'
        );

        return redirect()->route('statskk.index')->with($notification);
    }

    
    public function destroy($id)
    {
        //
    }
}
