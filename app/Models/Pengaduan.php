<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'no_pengaduan',
        'tgl_pengaduan',
        'nik',
        'isi_laporan',
        'foto',
        'status'
    ];

    public function masyarakat(){
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }
    public function tanggapan(){
        return $this->hasMany(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
    
   
}
