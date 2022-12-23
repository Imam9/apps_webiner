<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DataPetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $data = [
            'title' => "Data Petugas",
            'petugas' => User::where('hak_akses', 'petugas')->get(),
        ];

        return view('petugas/datapetugas')->with('data', $data);
    }

    public function insert(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'hak_akses' => 'petugas',
            'created_at' => Carbon::now(),
        ];


        User::insert($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function update(Request $request){

        $id = $request->id;

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ];


        User::where('id', $id)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil diupdate!');
    }

    public function delete($id){
        User::where('id', $id)->delete();

        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }
}
