<?php

namespace App\Http\Controllers;

use App\Models\KepalaKeluarga;
use App\Models\PasienMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['allpasien'] = PasienMaster::count();
        $data['pslaki'] = PasienMaster::where('jenkel','L')->count();
        $data['pswomen'] = PasienMaster::where('jenkel','P')->count();
        $data['kk'] = KepalaKeluarga::all()->count();
        $data['kkperdes'] = KepalaKeluarga::select('desa_kode', DB::raw('count(*) as total'))
        ->groupBy('desa_kode')
        ->get();

        $data['psperdes'] = PasienMaster::select('desa_kode', DB::raw('count(*) as total'))
        ->groupBy('desa_kode')
        ->get();


        return view('home',$data);
    }
}
