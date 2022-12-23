<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        return view('anggota/databuku')->with('data', $data);
    }

    public function detail($id_buku){

        $data = [
            'title' => 'Detail Buku',
            'buku' => Buku::where('id_buku', $id_buku)->first(),
        ];

        return view('anggota/detailbuku')->with('data', $data);
    }

}
