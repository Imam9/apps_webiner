<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\VwPeminjaman;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $data = [
            'title' => "Dashboard Petugas",
            'jumlah_buku' => Buku::count(),
            'jumlah_peminjaman' => VwPeminjaman::whereIn('status_peminjaman', ['pengajuan pinjaman', 'dipinjam', 'ditolak'])->count(),
            'jumlah_pengembalian' => VwPeminjaman::whereIn('status_peminjaman', ['dikembalikan', 'belum dikembalikan'])->count(),
        ];

        return view('petugas/dashboard')->with('data', $data);
    }
}
