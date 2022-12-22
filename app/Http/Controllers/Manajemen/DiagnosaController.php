<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\Diagnosa;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    public function index()
    {
        $data['diagnosa'] = Diagnosa::all();
        return view('Manajemen.Diagnosa.v_diagnosa',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Diagnosa Baru Telah Di Tambahkan ',
            'alert-type' => 'success'
        );

        $gagal = array(
            'message' => 'Diagnosa Sudah Ada',
            'alert-type' => 'warning'
        );

        $validateData = $request->validate([
            'name' => 'required|unique:diagnosas',
        ]);

        if ( !$validateData == true)
        {
            return redirect()->back()->with($gagal);
        }else{
            
            $data = new Diagnosa();
            $data->name = $request->name;
            $data->save();
    
            return redirect()->route('diagnosa.index')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {

        $gagal = array(
            'message' => 'Diagnosa Sudah Ada',
            'alert-type' => 'warning'
        );

        $validateData = $request->validate([
            'name' => 'required|unique:diagnosas',
        ]);

        if ( !$validateData == true)
        {
            return redirect()->back()->with($gagal);
        }else{

        $data = Diagnosa::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Diagnosa Telah Di Perbarui ',
            'alert-type' => 'success'
        );

        return redirect()->route('diagnosa.index')->with($notification);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
