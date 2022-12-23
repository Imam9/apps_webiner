<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\VwPeminjaman;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataPengembalianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $id_users  = Auth::user()->id;
        $data = [
            'title' => "Data Pengembalian",
            'pengembalian' => VwPeminjaman::where('id_anggota', $id_users)->whereIn('status_peminjaman', ['dikembalikan', 'belum dikembalikan'])->get(),
        ];

        return view('anggota/datapengembalian')->with('data', $data);
    }

    public function detail($id_peminjaman){
        $data = [
            'title' => "Detail Data Pengembalian",
            'detail' => VwPeminjaman::where('id_peminjaman', $id_peminjaman)->first(),
        ];

        return view('anggota/detailpengembalian')->with('data', $data);
    }

 
}
