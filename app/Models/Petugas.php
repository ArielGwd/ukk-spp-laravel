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
// class Siswa extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable;
//     //     use HasApiTokens, HasFactory, Notifiable;

//     protected $table = "siswa";
//     protected $primaryKey = 'nisn';
//     protected $fillable = [
//         'nis',
//         'nama',
//         'id_kelas',
//         'alamat',
//         'no_telp',
//         'password',
//     ];
//     public $timestamps = false;

//     public function kelas()
//     {
//         return $this->belongsTo(Kelas::class, 'id_kelas');
//     }
// }

class Petugas extends Authenticatable
{
    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "petugas";
    protected $primaryKey = "id_petugas";
    protected $fillable = ['username', 'password', 'nama_petugas', 'level'];
    public $timestamps = false;

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}


// // use Illuminate\Database\Eloquent\Factories\HasFactory;
// // use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
