<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// namespace App\Models;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //     use HasApiTokens, HasFactory, Notifiable;

    protected $table = "siswa";
    protected $primaryKey = 'nisn';
    protected $fillable = [
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'no_telp',
        'password',
    ];
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
