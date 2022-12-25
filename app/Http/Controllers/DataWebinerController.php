<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Kategori;
use App\Models\VwWebiner;
use App\Models\VwPendaftaran;
use App\Models\Institusi;
use App\Models\Pendaftaran;
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

        if(Auth::user()->hak_akses == 'institusi'){
            $id_users =  Auth::user()->id;
            $data = [
                'title' => "Data Webiner",
                'webiner' => VwWebiner::where('id_users', $id_users)->get(),
                'kategori' => Kategori::get(),
            ];
    
            return view('institusi/datawebiner')->with('data', $data);
        }else if(Auth::user()->hak_akses == 'pengguna'){
            $data = [
                'title' => "Data Webiner",
                'webiner' => VwWebiner::get(),
                'kategori' => Kategori::get(),
            ];
    
            return view('pengguna/datawebiner')->with('data', $data);
        }
    }

    public function insert(Request $request){

        $berkas = $request->file('gambar');
        $nama_document = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'webiner';

        $berkas->move($tujuan_upload,$nama_document);
        
        $id_users = Auth::user()->id;
        $institusi = Institusi::where('id_users', $id_users)->first();
        $id_institusi = $institusi->id_institusi;

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
            'id_institusi' => $id_institusi,
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
        
        $data = [
            'title' => "Detail Data Webiner",
            'detail' => VwWebiner::where('id_webiner', $id_webiner)->first(),
            'peserta' => VwPendaftaran::where('id_webiner', $id_webiner)->get(),
        ];

        return view('institusi/detail-webiner')->with('data', $data);
    }

    public function ikuti_webiner($id_webiner){
        
        $id_users = Auth::user()->id;
      
        $cek_data = Pendaftaran::where('id_users', $id_users)->where('id_webiner', $id_webiner)->count();

        if($cek_data > 0){
            return redirect()->back()->with('err_message', 'Anda Telah Mengikuti Webiner Ini Cek di Data Pendafataran!');
        }

        $data_webiner = VwWebiner::where('id_webiner', $id_webiner)->first();

        $slot_peserta = $data_webiner->sisa_slot_peserta;
        $slot_peserta_kurang = intval($slot_peserta - 1);
        

        if($slot_peserta_kurang == 0){
            return redirect()->back()->with('err_message', 'Kuota Peserta Sudah Habis!');
        }

        $data_update = array(
            'sisa_slot_peserta' => $slot_peserta_kurang
        );

        Webiner::where('id_webiner', $id_webiner)->update($data_update);


        $data = [
            'id_users' => $id_users,
            'id_webiner' => $id_webiner,
            'tgl_pendaftaran' => Carbon::now(),
            'created_at' => Carbon::now(),
        ];

        Pendaftaran::insert($data);

        return redirect('data-pendaftaran')->with('suc_message', 'Berhasil Mengikuti Webiner Ini!');
    }

}
