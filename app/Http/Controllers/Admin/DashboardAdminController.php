<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index(){
        $me = Auth::guard('petugas')->user();
        $total_user = Masyarakat::count();
        $user_verif = Masyarakat::where('status', 'aktif')->count();
        $user_unverif = Masyarakat::where('status', 'inaktif')->count();
        $total_pengaduan = Pengaduan::count();
        $tanggap = Pengaduan::where('status', 'selesai')->count();
        $belum_tanggap = Pengaduan::where('status', 'proses')->count();
        return view('admin.dashboard', compact('me', 'total_pengaduan', 'total_user', 'tanggap', 'belum_tanggap','user_verif','user_unverif'));
    }
}
