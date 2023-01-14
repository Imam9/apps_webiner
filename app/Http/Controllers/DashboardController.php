<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\VwInstitusi;
use App\Models\Institusi;
use App\Models\Webiner;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::user()->hak_akses == 'institusi'){

            $id_users = Auth::user()->id;

            $institusi = Institusi::where('id_users', $id_users)->first();
            $id_institusi = $institusi->id_institusi;

            $data = [
                'title' => "Dashboard Institusi",
                'jumlah_data_materi' => Webiner::join('materi', 'webiner.id_webiner', '=', 'materi.id_webiner')->where('webiner.id_institusi', $id_institusi)->count(),
                'jumlah_data_sertifikat' => Webiner::join('sertifikat', 'webiner.id_webiner', '=', 'sertifikat.id_webiner')->where('webiner.id_institusi', $id_institusi)->count(),
                'jumlah_data_webiner' => Webiner::where('id_institusi', $id_institusi)->count(),
                'jumlah_profesi' => User::selectRaw('profesi, COUNT(profesi) as jumlah')->where('profesi', '!=', '')->groupBy('profesi')->get(),
                'jumlah_kategori' => Webiner::selectRaw('institusi.id_institusi, webiner.nama_webiner, kategori.kategori, COUNT(kategori) as jumlah')->join('institusi', 'webiner.id_institusi', '=', 'institusi.id_institusi')->join('kategori', 'kategori.id_kategori', '=', 'webiner.id_kategori')->where('institusi.id_institusi', $id_institusi)->groupBy('kategori')->get(),
                'jumlah_webiner' =>Webiner::selectRaw('institusi.id_institusi ,id_webiner, nama_webiner, MONTHNAME(tgl_webiner) AS bulan, YEAR(tgl_webiner) AS tahun, COUNT(tgl_webiner) as jumlah_webiner')->join('institusi', 'webiner.id_institusi', '=', 'institusi.id_institusi')->where('institusi.id_institusi', $id_institusi)->groupBy('bulan','tahun')->get(),
            ];
    
            return view('institusi/dashboard')->with('data', $data);
        
        }else if(Auth::user()->hak_akses == 'pengguna'){
            $data = [
                'title' => "Dashboard Pengguna",
            ];
    
            return view('pengguna/dashboard')->with('data', $data);
        }else{

            $data = [
                'title' => "Dashboard Admin",
                'jumlah_data_materi' => Webiner::join('materi', 'webiner.id_webiner', '=', 'materi.id_webiner')->count(),
                'jumlah_data_sertifikat' => Webiner::join('sertifikat', 'webiner.id_webiner', '=', 'sertifikat.id_webiner')->count(),
                'jumlah_data_webiner' => Webiner::count(),
                'jumlah_profesi' => User::selectRaw('profesi, COUNT(profesi) as jumlah')->where('profesi', '!=', '')->groupBy('profesi')->get(),
                'jumlah_kategori' => Webiner::selectRaw('institusi.id_institusi, webiner.nama_webiner, kategori.kategori, COUNT(kategori) as jumlah')->join('institusi', 'webiner.id_institusi', '=', 'institusi.id_institusi')->join('kategori', 'kategori.id_kategori', '=', 'webiner.id_kategori')->groupBy('kategori')->get(),
                'jumlah_webiner' => Webiner::selectRaw('institusi.id_institusi ,id_webiner, nama_webiner, MONTHNAME(tgl_webiner) AS bulan, YEAR(tgl_webiner) AS tahun, COUNT(tgl_webiner) as jumlah_webiner')->join('institusi', 'webiner.id_institusi', '=', 'institusi.id_institusi')->groupBy('bulan','tahun')->get(),
            ];
    
            return view('admin/dashboard')->with('data', $data);
        }

    }
}
