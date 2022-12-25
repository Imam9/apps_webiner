<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Materi;
use App\Models\Kategori;
use App\Models\VwWebiner;
use App\Models\VwMateri;
use App\Models\VwWebinerMateri;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataMateriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $id_users =  Auth::user()->id;

        $data = [
            'title' => "Data Materi",
            'webiner' => VwWebinerMateri::where('id_users', $id_users)->get(),
            // 'materi' => VwMateri::get('id_users', $id_users)->get(),
        ];

        return view('institusi/datamateri')->with('data', $data);
    }

    public function add_materi($id_webiner)
    {

        $id_users =  Auth::user()->id;

        $data = [
            'title' => "Tambahkan Materi",
            'id_webiner' => $id_webiner,
            'materi' => VwMateri::where('id_webiner', $id_webiner)->get(),
            'detail' => VwWebiner::where('id_users', $id_users)->where('id_webiner', $id_webiner)->first(),
        ];

        return view('institusi/adddatamateri')->with('data', $data);
    }

    public function insert(Request $request){

        $berkas = $request->file('file_materi');
        $nama_document = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'materi';

        $berkas->move($tujuan_upload,$nama_document);

        $data = [
            'nama_materi' => $request->nama_materi,
            'deskripsi_materi' => $request->deskripsi_materi,
            'id_webiner' => $request->id_webiner,
            'file_materi' => $nama_document,
            'created_at' => Carbon::now(),
        ];


        Materi::insert($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function update(Request $request){

        $id_materi = $request->id_materi;
        $berkas = $request->file('file_materi');
        if($berkas == NULL){
            $data = [
                'nama_materi' => $request->nama_materi,
                'deskripsi_materi' => $request->deskripsi_materi,
            ];
    
        }else{
            $nama_document = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'webiner';
    
            $berkas->move($tujuan_upload,$nama_document);
            
            $data = [
                'nama_materi' => $request->nama_materi,
                'deskripsi_materi' => $request->deskripsi_materi,
                'file_materi' => $nama_document,
            ];
        }

        Materi::where('id_materi', $id_materi)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil diupdate!');
    }

    public function delete($id_materi){
        add_materi::where('id_materi', $id_materi)->delete();
        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }

    public function detail($id_webiner){
        
        $id_users = Auth::user()->id;
        
        $data = [
            'title' => "Detail Data Webiner",
            'detail' => VwWebiner::where('id_users', $id_users)->where('id_webiner', $id_webiner)->first(),
        ];

        return view('institusi/addmateriwebiner')->with('data', $data);
    }
}
