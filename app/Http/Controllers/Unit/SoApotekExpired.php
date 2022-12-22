<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\SO\SoApotek;
use App\Models\SoApotekFinal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SoApotekExpired extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['ap'] = SoApotekFinal::whereDate('expired', '<', Carbon::now())->paginate(10);
        return view('Unit.Farmasi.SO.v_expired',$data);
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
        $user = SoApotekFinal::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Obat Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
