<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    public $timestamps = false;

    // relasi tabel
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn');
    }

    public function spp()
    {
        return $this->belongsTo(SPP::class, 'id_spp');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
