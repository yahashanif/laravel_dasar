<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){

        return view('page.login');
    }

    public function register(){

        return view('page.register');
    }

    public function daftar(Request $request){

        $validator = Validator::make($request->all(),[
            'nama' =>'required',
            'username' =>'required',
            'password' =>'required',

        ]);
        if($validator->fails()){
            return back();
        }
        $simpan= DB::table('logins')->insert([
            'nama'=> $request->nama,
            'username'=> $request->username,
            'password'=>Hash::make($request->password),
        ]);
        if($simpan == TRUE){
            return redirect ('/')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('register')-> with('error','Data Gagal Disimpan');

        }
    }

    public function aksilogin(Request $request){
        $login = $request->validate([
            'username' =>['required'],
            'password' =>['required'],
        ]);
       

        if(Auth::guard('login')->attempt($login))
        {
            $request->session()->regenerate();
            return redirect('home');

        }
            return back();

    }

    public function keluar(Request $r)
    {
        Auth::guard('login')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }
}
