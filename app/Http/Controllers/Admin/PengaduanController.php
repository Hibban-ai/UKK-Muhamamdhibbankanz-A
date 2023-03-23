<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index($no_pengaduan){
        $data = Pengaduan::with('masyarakat')->where('no_pengaduan', $no_pengaduan)->firstOrFail();
        if ($data->status == 'selesai') {
            $tanggapan = Tanggapan::with('petugas')->where('id_pengaduan', $data->id_pengaduan)->first();
            return view('admin.tanggapan.detail-done', compact('data', 'tanggapan'));
        }else{
            return view('admin.tanggapan.detail', compact('data'));
        }
    }

    public function createTanggapan(Request $request, $no_pengaduan){
        $pengaduan = Pengaduan::where('no_pengaduan', $no_pengaduan)->first();
        if ($pengaduan) {
            $request->validate([
                'tanggapan' => 'required'
            ]);

            $code = $this->tanggapanCode();
            Tanggapan::insert([
                'no_tanggapan' => $code,
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'tgl_tanggapan' => Carbon::now(),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('petugas')->user()->id_petugas
            ]);
            $pengaduan->update([
                'status' => 'selesai'
            ]);

            return redirect()->route('admin.pengaduan-undone')->with('success', 'Tanggapan berhasil diupload');
        }

    }

    public function tanggapanCode(){
        $str = Str::random(20);
        $data = Tanggapan::where('no_tanggapan', $str)->first();
        if ($data) {
            return $this->pengaduanCode();
        }
        return $str;
    }
    
    public function generatePDF(Request $request){
        $start = Carbon::parse($request->date1);
        $end = Carbon::parse($request->date2);
        $data = Pengaduan::whereDate('tgl_pengaduan','<=',$end)
        ->whereDate('tgl_pengaduan','>=',$start)->orderBy('tgl_pengaduan', 'desc')
        ->get();


        $pdf = PDF::loadview('admin.pengaduan-filepdf',['data'=>$data]);
    	return $pdf->download('pengaduan-masyarakat.pdf');

    }

    public function laporan()
    {
        $data = Pengaduan::get();
       return view('admin.pengaduan-generate', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);

    }


}
