<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function index(){
        return view('Login');
    }

    public function register(Request $request){

        // insert data ke tabel pegawai
        DB::table('tbl_user')->insert([
            'nama_user' => $request -> nama,
            'email' => $request -> email,
            'password' => $request -> password
        ]);

        return redirect('/login');
    }

    public function masuk(Request $request){
        $user = DB::table('tbl_user')->where('email', $request->email)->first();
        if($user->password == $request->password){
            // $request->session()->put('id', $user->id); // dapat digunakan dengan fungsi pos saja
            Session::put('id_user', $user->id);           // dapat digunakan secara fleksibel
            echo 'Data disimpan dengan session id = '.$request->session()->get('id');
            return redirect('/');
        }else {
            echo "Anda gagal login";
        }
    }

    public function keluar(){
        Session::forget('id_user');
        return redirect('/');
    }
}
