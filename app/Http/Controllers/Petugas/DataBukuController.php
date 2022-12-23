<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DataBukuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $data = [
            'title' => "Data Buku",
            'buku' => Buku::get(),
        ];

        return view('petugas/databuku')->with('data', $data);
    }

    public function insert(Request $request){

        $berkas = $request->file('gambar');
        $nama_document = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'buku';

        $berkas->move($tujuan_upload,$nama_document);
        
        $data = [
            'nama_buku' => $request->nama_buku,
            'gambar_buku' => $nama_document,
            'penulis' => $request->penulis,
            'stok_buku' => $request->stok_buku,
            'penerbit' => $request->penerbit,
            'deskripsi' => $request->deskripsi,
            'created_at' => Carbon::now(),
        ];


        Buku::insert($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function update(Request $request){

        $id_buku = $request->id_buku;
        $berkas = $request->file('gambar');
        if($berkas == NULL){
            $data = [
                'nama_buku' => $request->nama_buku,
                'penulis' => $request->penulis,
                'stok_buku' => $request->stok_buku,
                'penerbit' => $request->penerbit,
                'deskripsi' => $request->deskripsi,
            ];
        }else{
            $nama_document = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'buku';
    
            $berkas->move($tujuan_upload,$nama_document);
            
            $data = [
                'nama_buku' => $request->nama_buku,
                'gambar_buku' => $nama_document,
                'penulis' => $request->penulis,
                'stok_buku' => $request->stok_buku,
                'penerbit' => $request->penerbit,
                'deskripsi' => $request->deskripsi,
            ];
        }


        Buku::where('id_buku', $id_buku)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil diupdate!');
    }

    public function delete($id_buku){
        Buku::where('id_buku', $id_buku)->delete();

        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }
}
