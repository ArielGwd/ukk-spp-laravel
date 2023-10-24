<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudKelasController;
use App\Http\Controllers\CrudPetugasController;
use App\Http\Controllers\CrudSiswaController;
use App\Http\Controllers\CRUDSPPController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you  can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });


Route::group(
    ['middleware' => ['auth:pelajar,admin']],
    function () {
        Route::get('/', [DashboardController::class, 'showDashboard']);
    }
);

Route::get('/error/404', [AuthController::class, 'error404'])->name('error404');

Route::group(
    ['middleware' => ['auth:admin', 'CekLevel:petugas,admin']],
    function () {

        // melihat history laporan pembayaran
        Route::get('/laporan', [LaporanController::class, 'showLaporan']);
        Route::get('/pembayaran', [PembayaranController::class, 'showTransaksi']);
        Route::post('/pembayaran/transaksi', [PembayaranController::class, 'insertTransaksi'])->name('transaksi');

        // melihat detail laporan pembayaran
        Route::get('/laporan/siswa/{nisn}', [LaporanController::class, 'laporanSiswa']);
    }
);

// -------------------------------- CRUD CRUD CRUD ---------------------------------- //
Route::group(
    ['middleware' => ['auth:admin', 'CekLevel:admin']],
    function () {

        // siswa
        Route::get('/siswa', [CrudSiswaController::class, 'showCrudSiswa']);
        Route::get('/siswa/tambah', [CrudSiswaController::class, 'showCreateSiswa']);
        Route::post('/siswa/tambah/post', [CrudSiswaController::class, 'CreateSiswa'])->name('create.siswa');
        Route::get('/siswa/ubah/{nisn}', [CrudSiswaController::class, 'showUbahSiswa']);
        Route::post('/siswa/ubah/{nisn}/post', [CrudSiswaController::class, 'ubahSiswa'])->name('ubah.siswa');
        Route::get('/siswa/hapus/{nisn}', [CrudSiswaController::class, 'hapusSiswa']);

        // petugas
        Route::get('/petugas', [CrudPetugasController::class, 'showCrudPetugas']);
        Route::get('/petugas/tambah', [CrudPetugasController::class, 'showCreatePetugas']);
        Route::post('/petugas/tambah/post', [CrudPetugasController::class, 'CreatePetugas'])->name('create.petugas');
        Route::get('/petugas/ubah/{id_petugas}', [CrudPetugasController::class, 'showUbahPetugas']);
        Route::post('/petugas/edit/{id_petugas}', [CrudPetugasController::class, 'ubahPetugas'])->name('update.petugas');
        Route::get('/petugas/hapus/{id_petugas}', [CrudPetugasController::class, 'hapusPetugas']);

        // kelas
        Route::get('/kelas', [CrudKelasController::class, 'showCrudKelas']);
        Route::get('/kelas/tambah', [CrudKelasController::class, 'showCreateKelas']);
        Route::post('/kelas/tambah/post', [CrudKelasController::class, 'CreateKelas'])->name('tambah.kelas');
        Route::get('/kelas/ubah/{id_kelas}', [CrudKelasController::class, 'showUpdateKelas']);
        Route::post('/kelas/ubah/{id_kelas}/post', [CrudKelasController::class, 'UpdateKelas'])->name('ubahKelas');
        Route::get('/kelas/hapus/{id_kelas}', [CrudKelasController::class, 'hapusKelas'])->name('hapus.kelas');

        // spp
        Route::get('/spp', [CRUDSPPController::class, 'showSPP']);
        Route::get('/spp/tambah', [CRUDSPPController::class, 'showCreateSPP']);
        Route::post('/spp/tambah/post', [CRUDSPPController::class, 'CreateSPP'])->name('tambah.spp');
        Route::get('/spp/ubah/{id_spp}', [CRUDSPPController::class, 'showUbahSPP']);
        Route::post('/spp/ubah/{id_spp}/post', [CRUDSPPController::class, 'updateSPP'])->name('ubah.spp');
        Route::get('/spp/hapus/{id_spp}', [CRUDSPPController::class, 'hapusSPP']);

        // entri transaksi

        Route::get('/pembayaran/laporan', [PembayaranController::class, 'showLaporan']);

        // laporan
        Route::get('/laporan/generate', [LaporanController::class, 'generateLaporan']);
    }
);

// halaman pilih login
Route::group(
    ['middleware' => ['isLogin']],
    function () {
        // login show ALL
        Route::get('/login/all', [AuthController::class, 'showLoginAll'])->name('login');

        // auth siswa
        Route::get('/login/siswa', [AuthController::class, 'showLoginSiswa'])->name('siswa.siswa');
        Route::post('login/siswa/submit', [AuthController::class, 'loginSiswa'])->name('login.siswa');

        // auth petugas
        Route::get('/login/petugas', [AuthController::class, 'showLogPetugas'])->name('petugas.petugas');
        Route::post('/login/petugas/log', [AuthController::class, 'loginPetugas'])->name('login.petugas');
    }
);
// siswa
Route::get('/logout/siswa', [AuthController::class, 'logoutSiswa']);
// auth petugas
Route::get('/logout/petugas', [AuthController::class, 'logoutPetugas']);
