<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\VwInstitusi;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::user()->hak_akses == 'institusi'){
            $data = [
                'title' => "Dashboard Institusi",
            ];
    
            return view('institusi/dashboard')->with('data', $data);
        
        }else if(Auth::user()->hak_akses == 'pengguna'){
            $data = [
                'title' => "Dashboard Pengguna",
            ];
    
            return view('pengguna/dashboard')->with('data', $data);
        }else{
            $data = [
                'title' => "Dashboard Admin",
            ];
    
            return view('admin/dashboard')->with('data', $data);
        }

    }
}
