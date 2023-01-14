<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\VwInstitusi;
use App\Models\Kategori;
use App\Models\Institusi;

class AuthController extends Controller
{
    public function register()
    {
        $data = [
            'kategori' => Kategori::get(),
        ];
        return view('auth.register', $data);
    }

    public function register_institusi()
    {
        return view('auth.register-institusi');
    }

    public function insert_register(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'id_kategori' => $request->id_kategori,
            'jenis_kelamin' => $request->jenis_kelamin,
            'profesi' => $request->profesi,
            'tgl_lahir' => $request->tgl_lahir,
            'aktiv' => '1',
            'password' => bcrypt($request->password),
            'hak_akses' => 'pengguna',
            'created_at' => Carbon::now(),
        ];


        User::insert($data);

        return redirect('login')->with('suc_message', 'Data Berhasil register!');

        // return redirect()->route('login');
    }

    public function insert_register_institusi(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'profesi' => $request->profesi,
            'tgl_lahir' => $request->tgl_lahir,
            'aktiv' => '1',
            'password' => bcrypt($request->password),
            'hak_akses' => 'institusi',
            'created_at' => Carbon::now(),
        ];


        User::insert($data);

        return redirect('login')->with('suc_message', 'Data Berhasil register!');

        // return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }


    public function action_login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();

            if(Auth::user()->hak_akses == 'institusi'){
                $id_users =  Auth::user()->id;
                $cek_data = VWinstitusi::where('id', $id_users)->count();
                if($cek_data > 0){
                    return redirect('dashboard-institusi');
                }else{
                    return redirect('lengkapi-institusi');
                }
            }else if(Auth::user()->hak_akses == 'pengguna'){
                return redirect('dashboard-pengguna');
            }else{
                return redirect('dashboard-admin');
            }   
        }

        return redirect()->back()->with('err_message', 'Email dan Password Salah !!');
    }


    public function lengkapi_institusi(){
        $data = [
            'title' => "Lengkapi Insititusi",
        ];

        return view('institusi/lengkapi-institusi')->with('data', $data);

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function profile()
    {
        $id_users = Auth::user()->id;

        $data = [
            'title' => "Data Profile",
            'profile' => User::where('id', $id_users)->first(),
        ];

        return view('auth/profile')->with('data', $data);
    }

    public function update_profile(Request $request){

        $id_users = $request->id_users;

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ];


        User::where('id', $id_users)->update($data);

        return redirect()->back()->with('suc_message', 'Data Berhasil disimpan!');
    }

    public function update_lengkapi_insititusi(Request $request){
        $id_users = Auth::user()->id;

        $data = [
            'nama_institusi' => $request->nama_institusi,
            'email_institusi' => $request->email_institusi,
            'tgl_berdiri' => $request->tgl_berdiri,
            'phone_number_institusi' => $request->phone_number_institusi,
            'id_users' => $id_users,
            'created_at' => Carbon::now(),
        ];

        Institusi::insert($data);

        return redirect('dashboard-institusi')->with('suc_message', 'Data Berhasil disimpan!');
    }

}
