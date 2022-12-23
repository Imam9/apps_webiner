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

class DataPeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        $data = [
            'title' => "Data Peminjaman",
            'peminjaman' => VwPeminjaman::where('status_peminjaman', 'pengajuan pinjaman')->get(),
            'dipinjam' => VwPeminjaman::where('status_peminjaman', 'dipinjam')->get(),
        ];

        return view('petugas/datapeminjaman')->with('data', $data);
    }

    public function approve_peminjaman(Request $request ){

        $buku = Buku::where('id_buku', $request->id_buku)->first();

        $stok_buku = intval($buku->stok_buku - $request->jml_peminjaman);

        $data_buku = [
            'stok_buku' => $stok_buku
        ];

        Buku::where('id_buku', $request->id_buku)->update($data_buku);

        $id_peminjaman = $request->id_peminjaman;

        $data = [
            'status_peminjaman' => 'dipinjam',
            'batas_pengembalian' => $request->batas_pengembalian,
            'updated_at' => Carbon::now(),
            'id_petugas' => Auth::user()->id,
        ];


        Peminjaman::where('id_peminjaman', $id_peminjaman)->update($data);

        return redirect('data-peminjaman')->with('suc_message', 'Data Berhasil disimpan!');
    }


    public function detail($id_peminjaman){
        $data = [
            'title' => "Detail Data Peminjaman",
            'detail' => VwPeminjaman::where('id_peminjaman', $id_peminjaman)->first(),
        ];

        return view('petugas/detailpeminjaman')->with('data', $data);
    }

}
