<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BPKBController;
use App\Http\Controllers\STNKController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\SamsatController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\KehilanganController;
use App\Http\Controllers\WajibPajakController;
use App\Http\Controllers\BarangKeluarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Regular Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

// Login Wajib Pajak
Route::get('/login/wajib-pajak', [LoginController::class, 'showLoginForm'])->name('loginWP')->middleware('guest');
Route::post('/login/wajib-pajak', [LoginController::class, 'loginWajibPajak']);

Route::middleware('auth:wajibpajak,web')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::get('/', function () {
        return view('welcome');
    });

    // Mutasi Berlaku atau Dibatalkan, proses perubahan status
    Route::post('/mutasi/{mutasi}/berlakukan', [MutasiController::class, 'berlakukan']);
    Route::post('/mutasi/{mutasi}/batalkan', [MutasiController::class, 'batalkan']);

    Route::resource('mutasi', MutasiController::class);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware(['auth', 'user-access:1'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/ruangan/cetak', [RuanganController::class, 'ruanganCetak']);
    Route::resource('ruangan', RuanganController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('/barang/cetak', [BarangController::class, 'barangCetak']);
    Route::resource('barang', BarangController::class);
    Route::get('/barangkeluar/cetak', [BarangKeluarController::class, 'barangkeluarCetak']);
    Route::resource('barangkeluar', BarangKeluarController::class);
});

Route::middleware(['auth', 'user-access:1|2'])->group(function () {
    Route::get('/kerusakan/cetak', [KerusakanController::class, 'kerusakanCetak']);
    Route::resource('kerusakan', KerusakanController::class);
    Route::get('/kehilangan/cetak', [KehilanganController::class, 'cetakKehilangan']);
    Route::resource('kehilangan', KehilanganController::class);
    Route::get('/perbaikan/cetak', [PerbaikanController::class, 'perbaikanCetak']);
    Route::resource('perbaikan', PerbaikanController::class);

    Route::resource('wajib-pajak', WajibPajakController::class);

    Route::resource('samsat', SamsatController::class);

    Route::resource('dealer', DealerController::class);

    Route::resource('kendaraan', KendaraanController::class);

    Route::resource('bpkb', BPKBController::class);

    Route::resource('stnk', STNKController::class);
});
