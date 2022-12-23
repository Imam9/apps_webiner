<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\VwPeminjaman;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id_users  = Auth::user()->id;
        $data = [
            'title' => "Dashboard",
            'jumlah_buku' => Buku::count(),
            'jumlah_peminjaman' => VwPeminjaman::where('id_anggota', $id_users)->whereIn('status_peminjaman', ['pengajuan pinjaman', 'dipinjam', 'ditolak'])->count(),
            'jumlah_pengembalian' => VwPeminjaman::where('id_anggota', $id_users)->whereIn('status_peminjaman', ['dikembalikan', 'belum dikembalikan'])->count(),
        ];

        return view('anggota/dashboard')->with('data', $data);
    }
}
