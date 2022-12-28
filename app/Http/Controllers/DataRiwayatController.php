<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Kategori;
use App\Models\Materi;
use App\Models\VwMateri;
use App\Models\VwWebiner;
use App\Models\VwPendaftaran;
use App\Models\Institusi;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataRiwayatController extends Controller
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
    
            return view('institusi/datariwayat')->with('data', $data);
        }else if(Auth::user()->hak_akses == 'pengguna'){
            $tgl = date('Y-m-d');
            $data = [
                'title' => "Data Riwayat Pendaftaran",
                'riwayat' => VwPendaftaran::where('tgl_webiner', '<', $tgl)->get(),
                'materi' => Materi::get(),
            ];
    
            return view('pengguna/datariwayat')->with('data', $data);
        }
    }

    public function detail($id_pendaftaran){

        $detail = VwPendaftaran::where('id_pendaftaran',$id_pendaftaran)->first();
        $data = [
            'title' => "Data Riwayat Pendaftaran",
            'materi' => VwMateri::where('id_webiner', $detail->id_webiner)->get(),
            'detail' => $detail,
        ];

        return view('pengguna/detailriwayatpendaftaran')->with('data', $data);
    }


    
}
