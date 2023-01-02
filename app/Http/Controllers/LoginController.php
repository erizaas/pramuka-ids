<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Dashboard;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            Alert::success('Selamat', 'Kamu Berhasil Login!');
            $request->session()->regenerate();
            return redirect('/#');
        }

        return back()->with('error', 'Email atau Password Salah');
    }
}
