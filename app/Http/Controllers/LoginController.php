<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('login.index');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Tolong isi email Anda!',
            'password.required' => 'Tolong isi password Anda!',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            } elseif (Auth::user()->role == 'manajer'){
                return redirect('/manajer');
            } elseif (Auth::user()->role == 'pegawai'){
                return redirect('/pegawai');
            }
        }else{
            return redirect('')->withErrors('Username dan Password tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
