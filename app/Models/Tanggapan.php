<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    protected $fillable = [
        'no_tanggapan',
        'id_pengaduan',
        'tgl_tanggapan',
        'id_petugas'
    ];

    public function pengaduan(){
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id_pengaduan');
    }

    public function petugas(){
        return $this->belongsTo(Admin::class, 'id_petugas', 'id_petugas');
    }
    
}
