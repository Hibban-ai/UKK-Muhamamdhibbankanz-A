<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use PDF;
class UserController extends Controller
{
    public function index()
    {
        $data = Tanggapan::all();
        return view ('welcome',compact('data'));
    }
     // export PDF
     public function exportPDF() {
       
        $data = Tanggapan::all();
  
        $pdf = PDF::loadView('welcome', ['data' => $data]);
        
        return $pdf->download('user.pdf');
        
      }
}