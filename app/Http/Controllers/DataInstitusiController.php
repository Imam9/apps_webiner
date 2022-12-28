<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Webiner;
use App\Models\Materi;
use App\Models\Kategori;
use App\Models\Institusi;
use App\Models\VwWebiner;
use App\Models\VwMateri;
use App\Models\VwWebinerMateri;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataInstitusiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = [
            'title' => "Data Institusi",
            'users' => User::join('institusi', 'users.id', '=', 'institusi.id_users')->where('users.hak_akses', 'institusi')->get(),
        ];

        return view('admin/datainstitusi')->with('data', $data);
    }



}
