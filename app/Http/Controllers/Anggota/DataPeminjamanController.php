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

class DataPeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $id_users  = Auth::user()->id;
        $data = [
            'title' => "Data Peminjaman",
            'peminjaman' => VwPeminjaman::where('id_anggota', $id_users)->whereIn('status_peminjaman', ['pengajuan pinjaman', 'dipinjam', 'ditolak'])->get(),
        ];

        return view('anggota/datapeminjaman')->with('data', $data);
    }

    public function insert(Request $request){

        

        $data = [
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'jml_peminjaman' => $request->jml_peminjaman,
            'id_anggota' => Auth::user()->id,
            'id_buku' => $request->id_buku,
            'status_peminjaman' => 'pengajuan pinjaman',
            'created_at' => Carbon::now(),
        ];


        Peminjaman::insert($data);

        return redirect('data-peminjaman-angggota')->with('suc_message', 'Data Berhasil disimpan!');
    }


    public function update(Request $request){

        $id_peminjaman = $request->id_peminjaman;
    
        $data = [
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'jml_peminjaman' => $request->jml_peminjaman,
            'id_anggota' => Auth::user()->id,
            'id_buku' => $request->id_buku,
            'status_peminjaman' => 'pengajuan pinjaman',
        ];


        Peminjaman::where('id_peminjaman', $id_peminjaman)->update($data);

        return redirect('data-peminjaman-angggota')->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function delete($id_peminjaman){
        Peminjaman::where('id_peminjaman', $id_peminjaman)->delete();

        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }


}
