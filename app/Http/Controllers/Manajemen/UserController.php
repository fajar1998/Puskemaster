<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }
    
    public function index()
    {
        $data['user'] = User::all();
        return view('Manajemen.User.v_user',$data);

    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:users',
        ]);
        $data = new User();
        $data->hak_akses = $request->hak_akses;
        $data->name = $request->name;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'Pengguna Di Tambahkan ',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
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
       

        $data = User::find($id);
        $data->name = $request->name;
        $data->hak_akses = $request->hak_akses;
        $data->password =  bcrypt($request->password);
        
        $data->save();

        $notification = array(
            'message' => 'Pengguna Di Perbarui ',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Pengguna Telah DiHapus',
            'alert-type' => 'warning'
        );
        return redirect()->route('user.index')->with($notification);
    }
}
