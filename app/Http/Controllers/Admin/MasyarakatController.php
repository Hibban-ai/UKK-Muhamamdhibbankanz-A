<?php

namespace App\Http\Controllers\Admin;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasyarakatController extends Controller
{
    public function toActive($id){
        try {
            $data = Masyarakat::where('id', $id)->first();
        if ($data) {
            $data->update([
                'status' => 'aktif'
            ]);
            return [
                'statusCode' => 200,
                'message' => 'Berhasil mengaktifkan akun user'
            ];
        }else{
            return [
                'statusCode' => 404,
                'message' => 'Data masyarakat tidak ditemukan'
            ];
        }
        } catch (\Throwable $th) {
            return [
                'statusCode' => 500,
                'message' => 'Ada masalah teknis silakan coba beberapa saat lagi'
            ];
        }


    }
}
