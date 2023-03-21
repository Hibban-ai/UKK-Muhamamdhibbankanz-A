<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function storeRegister(Request $request){
        $validator = $request->validate([
            'nik' => 'required|max:16|unique:masyarakat,nik',
            'nama' => 'required',
            'username' => 'required|unique:masyarakat,username|unique:petugas,username',
            'password' => 'required',
            'telp' => 'required|unique:masyarakat,telp|unique:petugas,telp',
        ]);
        try {
            $validator['password'] = Hash::make($request->password);
            Masyarakat::create($validator);
            return redirect()->route('login')->with('success', 'Registrasi Berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Sepertinya ada yang salah');
        }
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 'inaktif') {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Akunmu belum diaktifkan oleh admin, silakan tunggu beberapa saat lagi');
            }
            $request->session()->regenerate();
            return redirect()->route('masyarakat.dashboard');
        }

        return back()->withErrors([
            'username' => 'Autentikasi gagal.',
        ])->onlyInput('username');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
