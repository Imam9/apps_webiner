<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Materi;
use App\Models\Kategori;
use App\Models\Institusi;
use App\Models\VwWebiner;
use App\Models\VwMateri;
use App\Models\VwWebinerMateri;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataKategoriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title' => "Data Kategori",
            'kategori' => Kategori::get(),
        ];

        return view('admin/datakategori')->with('data', $data);
    }



    public function insert(Request $request){

        $data = [
            'kategori' => $request->kategori,
            'created_at' => Carbon::now(),
        ];


        Kategori::insert($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function update(Request $request){

        $id = $request->id;
      
            
        $data = [
            'kategori' => $request->kategori,
            
        ];

        Kategori::where('id', $id)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil diupdate!');
    }

    public function delete($id){
        Kategori::where('id', $id)->delete();
        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }


}
