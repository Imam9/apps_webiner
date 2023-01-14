<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Materi;
use App\Models\Kategori;
use App\Models\Sertifikat;
use App\Models\DetailSertifikat;
use App\Models\Institusi;
use App\Models\VwWebiner;
use App\Models\VwMateri;
use App\Models\VwSertifikat;
use App\Models\VwWebinerMateri;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class DataSertifikatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        
        if(Auth::user()->hak_akses == 'institusi'){
            $id =  Auth::user()->id;
            $institusi = Institusi::where('id_users', $id)->first();
            $tgl = date('Y-m-d');
            
            $id_institusi = $institusi->id_institusi;
            $data = [
                'title' => "Data Sertifikat",
                'webiner' => VwWebinerMateri::where('id_institusi', $id_institusi)->get(),
            ];
        
        }else{
            $data = [
                'title' => "Data Sertifikat",
                'webiner' => VwWebinerMateri::get(),
            ];
        }

        return view('institusi/datasertifikat')->with('data', $data);
    }

    public function add_sertifikat($id_webiner)
    {

        if(Auth::user()->hak_akses == 'institusi'){
            $id_users =  Auth::user()->id;
            $institusi = Institusi::where('id_users', $id_users)->first();
    
            $id_institusi = $institusi->id_institusi;
            $data = [
                'title' => "Tambahkan Sertifikat",
                'id_webiner' => $id_webiner,
                'sertifikat' => VwSertifikat::where('id_institusi', $id_institusi)->where('id_webiner', $id_webiner)->get(),
                'jumlah_sertifikat' => VwSertifikat::where('id_institusi', $id_institusi)->where('id_webiner', $id_webiner)->count(),
                'detail' => VwWebiner::where('id_users', $id_users)->where('id_webiner', $id_webiner)->first(),
            ];
    
            return view('institusi/add_sertifikat')->with('data', $data);

        }else{
            $data = [
                'title' => "Tambahkan Sertifikat",
                'id_webiner' => $id_webiner,
                'sertifikat' => VwSertifikat::where('id_webiner', $id_webiner)->get(),
                'jumlah_sertifikat' => VwSertifikat::where('id_webiner', $id_webiner)->count(),
                'detail' => VwWebiner::where('id_webiner', $id_webiner)->first(),
            ];
    
            return view('institusi/add_sertifikat')->with('data', $data);
        }
    }

    public function insert_template(Request $request){

        $berkas = $request->file('gambar_sertifikat');
        $nama_document = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'sertifikat';

        $berkas->move($tujuan_upload,$nama_document);
        
        $data = [
            'id_webiner' => $request->id_webiner,
            'nama_sertifikat' => $request->nama_sertifikat,
            'deskripsi_sertifikat' => $request->deskripsi_sertifikat,
            'gambar_sertifikat' => $nama_document,
            'created_at' => Carbon::now(),
        ];

        $sertifikat = Sertifikat::create($data);
        $id_sertifikat = $sertifikat->id;

        $data_detail = [
            'id_sertifikat' => $id_sertifikat,
            'created_at' => Carbon::now(),
        ];

        DetailSertifikat::insert($data_detail);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function cetak_sertifikat($id_sertifikat){

        $detail = VwSertifikat::where('id_sertifikat', $id_sertifikat)->first();

        $pdf = PDF::loadview('institusi/cetaksertifikat',['detail'=>$detail]);

    	// return $pdf->download('laporan-pegawai-pdf');

        return $pdf->setPaper('a4', 'landscape')->stream();

        // return view('institusi/cetaksertifikat')->with('data', $data);
    }

    public function delete_sertifikat($id_sertifikat){
        Sertifikat::where('id_sertifikat', $id_sertifikat)->delete();
        DetailSertifikat::where('id_sertifikat', $id_sertifikat)->delete();
        return redirect()->back()->with('suc_message', 'Data Berhasil Dihapus!');
    }


    public function update_detail_sertifikat(Request $request){

        if($request->file('gambar_ttd')){
            $berkas = $request->file('gambar_ttd');
            $nama_document = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'sertifikat';
    
            $berkas->move($tujuan_upload,$nama_document);
        
            $id_detail_sertifikat = $request->id_detail_sertifikat;
    
            $data = [
                'top_title' => $request->top_title,
                'top_nama' => $request->top_nama,
                'top_body' => $request->top_body,
                'top_title_ttd' => $request->top_title_ttd,
                'top_nama_ttd' => $request->top_nama_ttd,
                'padding_right' => $request->padding_right,
                'padding_left' => $request->padding_left,
                'nama_ttd' => $request->nama_ttd,
                'no_sertifikat' => $request->no_sertifikat,
                'gambar_ttd' => $nama_document,
                'created_at' => Carbon::now(),
            ];

        }else{
            $id_detail_sertifikat = $request->id_detail_sertifikat;
    
            $data = [
                'top_title' => $request->top_title,
                'top_nama' => $request->top_nama,
                'top_body' => $request->top_body,
                'top_title_ttd' => $request->top_title_ttd,
                'top_nama_ttd' => $request->top_nama_ttd,
                'padding_right' => $request->padding_right,
                'padding_left' => $request->padding_left,
                'nama_ttd' => $request->nama_ttd,
                'no_sertifikat' => $request->no_sertifikat,
                'created_at' => Carbon::now(),
            ];
        }

        DetailSertifikat::where('id_detail_sertifikat', $id_detail_sertifikat)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function cetak_sertifikat_peserta($id_webiner){

        if(Auth::user()->hak_akses == 'institusi' || Auth::user()->hak_akses == 'admin'){
            $detail = VwSertifikat::where('id_webiner', $id_webiner)->first();

            $pdf = PDF::loadview('institusi/cetaksertifikat',['detail'=>$detail]);
    
            // return $pdf->download('laporan-pegawai-pdf');
    
            return $pdf->setPaper('a4', 'landscape')->stream();
       
        }else{
            $cek_data = VwSertifikat::where('id_webiner', $id_webiner)->count();

            if($cek_data == 0){
                return redirect()->back()->with('err_message', 'belum ada template sertifikat yang di sediakan oleh institusi, mohon ditunggu!');
            }else{
    
                $id_users = Auth::user()->id;

                $detail = VwSertifikat::join('pendaftaran', 'pendaftaran.id_webiner', '=', 'vw_sertifikat.id_webiner')->join('users', 'users.id', '=', 'pendaftaran.id_users')->where('vw_sertifikat.id_webiner', $id_webiner)->where('users.id', $id_users)->first();
    
                $pdf = PDF::loadview('pengguna/cetaksertifikat',['detail'=>$detail]);
    
                // return $pdf->download('laporan-pegawai-pdf');
    
                return $pdf->setPaper('a4', 'landscape')->stream();
            }
        }
    }

}
