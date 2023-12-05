<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ProsesLogin extends Controller
{
    public function index(){
      
            return view('login.layouts.index');
        
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('Dashboard/Admin');
        }else{
            return view('login.layouts.index');
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('Dashboard/Admin');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

}
