<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(){
        return view('admin.petugas.index');
    }

    public function create(){
        return view('admin.petugas.create');
    }
    public function store(Request $request){
        $validate = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username|unique:masyarakat,username',
            'password' => 'required',
            'telp' => 'required|numeric'
        ]);

        Admin::insert([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => 'petugas'
        ]);
        return redirect()->route('admin.petugas.index')->with('success', 'Berhasil menambah petugas');
    }

    public function destroy($id){
        try {
            Admin::where('id_petugas', $id)->delete();
        return [
            'statusCode' => 200,
            'message' => 'Petugas berhasil dihapus'
        ];
        } catch (\Throwable $th) {
            return [
                'statusCode' => 500,
                'message' => 'Ada sesuatu yang salah, silakan coba beberapa saat lagi'
            ];
        }

    }
}

