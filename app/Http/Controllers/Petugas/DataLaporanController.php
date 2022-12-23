<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\VwPeminjaman;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataLaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title' => "Data Laporan",
            'pengembalian' => VwPeminjaman::where('status_peminjaman', 'dikembalikan')->get(),
        ];

        return view('petugas/datalaporan')->with('data', $data);
    }

    public function filter_laporan(Request $request){

        $dari_tanggal = $request->dari_tanggal.' 00:00:01';
        $sampai_tanggal = $request->sampai_tanggal.' 23:59:59';

        $data = [
            'title' => "Data Laporan",
            'pengembalian' => VwPeminjaman::where('status_peminjaman', 'dikembalikan')->where('tgl_peminjaman', '>=', $dari_tanggal)->where('tgl_peminjaman', '<=', $sampai_tanggal)->get(),
        ];

        return view('petugas/filterlaporan')->with('data', $data);

    }


}
