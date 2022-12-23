<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Kategori;
use App\Models\VwWebiner;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataWebinerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $id_users =  Auth::user()->id;

        $data = [
            'title' => "Data Webiner",
            'webiner' => VwWebiner::where('id_users', $id_users)->get(),
            'kategori' => Kategori::get(),
        ];

        return view('institusi/datawebiner')->with('data', $data);
    }

    public function insert(Request $request){

        $berkas = $request->file('gambar');
        $nama_document = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'webiner';

        $berkas->move($tujuan_upload,$nama_document);
        
        $id_users = Auth::user()->id;

        $data = [
            'nama_webiner' => $request->nama_webiner,
            'tgl_webiner' => $request->tgl_webiner,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'slot_peserta' => $request->slot_peserta,
            'id_kategori' => $request->id_kategori,
            'deskripsi_webiner' => $request->deskripsi_webiner,
            'link_webiner' => $request->link_webiner,
            'id_users' => $id_users,
            'gambar_webiner' => $nama_document,
            'created_at' => Carbon::now(),
        ];


        Webiner::insert($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function update(Request $request){

        $id_webiner = $request->id_webiner;
        $berkas = $request->file('gambar');
        if($berkas == NULL){
            $data = [
                'nama_webiner' => $request->nama_webiner,
                'tgl_webiner' => $request->tgl_webiner,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'slot_peserta' => $request->slot_peserta,
                'id_kategori' => $request->id_kategori,
                'deskripsi_webiner' => $request->deskripsi_webiner,
                'link_webiner' => $request->link_webiner,
            ];
    
        }else{
            $nama_document = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'webiner';
    
            $berkas->move($tujuan_upload,$nama_document);
            
            $data = [
                'nama_webiner' => $request->nama_webiner,
                'tgl_webiner' => $request->tgl_webiner,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'slot_peserta' => $request->slot_peserta,
                'sisa_slot_peserta' => $request->slot_peserta,
                'id_kategori' => $request->id_kategori,
                'deskripsi_webiner' => $request->deskripsi_webiner,
                'link_webiner' => $request->link_webiner,
                'gambar_webiner' => $nama_document,
            ];
        }


        Webiner::where('id_webiner', $id_webiner)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil diupdate!');
    }

    public function delete($id_webiner){
        Webiner::where('id_webiner', $id_webiner)->delete();

        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }

    public function detail($id_webiner){
        
        $id_users = Auth::user()->id;
        
        $data = [
            'title' => "Detail Data Webiner",
            'detail' => VwWebiner::where('id_users', $id_users)->first(),
        ];

        return view('institusi/detail-webiner')->with('data', $data);
    }
}
