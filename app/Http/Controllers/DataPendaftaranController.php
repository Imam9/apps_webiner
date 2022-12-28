<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Kategori;
use App\Models\Materi;
use App\Models\VwWebiner;
use App\Models\VwPendaftaran;
use App\Models\Institusi;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataPendaftaranController extends Controller
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
                'title' => "Data Pendaftaran",
                'webiner' => VwWebiner::where('id_users', $id_users)->get(),
                'kategori' => Kategori::get(),
            ];
    
            return view('institusi/datawebiner')->with('data', $data);
        }else if(Auth::user()->hak_akses == 'pengguna'){
            $tgl = date('Y-m-d');
            $id_users = Auth::user()->id;
            $data = [
                'title' => "Data Pendaftaran",
                'pendaftaran' => VwPendaftaran::where('tgl_webiner', '>=', $tgl)->where('id_users', $id_users)->get(),
                'materi' => Materi::get(),
                'kategori' => Kategori::get(),
            ];
    
            return view('pengguna/datapendaftaran')->with('data', $data);
        }else{
            $tgl = date('Y-m-d');
            $data = [
                'title' => "Data Pendaftaran",
                'riwayat' => VwPendaftaran::where('tgl_webiner', '>=', $tgl)->get(),
                'materi' => Materi::get(),
            ];
    
            return view('admin/datapendaftaran')->with('data', $data);
        }
    }


    public function insert_absensi(Request $request){
        
        $id_pendaftaran = $request->id_pendaftaran;

        $data = array(
            'tgl_absensi' => Carbon::now(),
        );

        Pendaftaran::where('id_pendaftaran', $id_pendaftaran)->update($data);

        return redirect()->back()->with('suc_message', 'Anda telah melakukan absensi!');
    }

    
}
