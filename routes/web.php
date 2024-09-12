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
use App\Http\Controllers\LaporanController;
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
    Route::post('/logout', [LoginController::class, 'logout']);
});

// User Admin
Route::middleware(['auth', 'user-access:1'])->group(function () {

    // Cetak Samsat
    Route::get('/samsat/cetak', [SamsatController::class, 'samsatCetak']);
    Route::get('/dealer/cetak', [DealerController::class, 'dealerCetak']);
    Route::get('/kendaraan/cetak', [KendaraanController::class, 'kendaraanCetak']);
    Route::get('/bpkb/cetak', [BPKBController::class, 'bpkbCetak']);
    Route::get('/stnk/cetak', [STNKController::class, 'stnkCetak']);
    Route::get('/wajib-pajak/cetak', [WajibPajakController::class, 'wajibpajakCetak']);
    Route::get('/mutasi/cetak', [MutasiController::class, 'mutasiCetak']);

    // Cetak UPPD
    Route::get('/ruangan/cetak', [RuanganController::class, 'ruanganCetak']);
    Route::get('/barang/cetak', [BarangController::class, 'barangCetak']);
    Route::get('/barangkeluar/cetak', [BarangKeluarController::class, 'barangkeluarCetak']);
    Route::get('/kerusakan/cetak', [KerusakanController::class, 'kerusakanCetak']);
    Route::get('/kehilangan/cetak', [KehilanganController::class, 'cetakKehilangan']);
    Route::get('/perbaikan/cetak', [PerbaikanController::class, 'perbaikanCetak']);

    Route::resource('user', UserController::class);
    Route::resource('laporan', LaporanController::class);
});

// Semua User
Route::middleware(['auth', 'user-access:1|3'])->group(function () {
    // Mutasi Berlaku atau Dibatalkan, proses perubahan status
    Route::post('/mutasi/{mutasi}/berlakukan', [MutasiController::class, 'berlakukan']);

    Route::resource('mutasi', MutasiController::class)->only([
        'edit',
        'destroy',
        'update'
    ]);
});

// User Pegawai Samsat
Route::middleware(['auth', 'user-access:1|3'])->group(function () {
    Route::resource('wajib-pajak', WajibPajakController::class)->only(
        [
            'index',
            'create',
            'edit',
            'destroy',
            'store',
            'update'
        ]
    );

    Route::resource('samsat', SamsatController::class);
    Route::resource('dealer', DealerController::class);
    Route::resource('kendaraan', KendaraanController::class)->only(
        [
            'index',
            'create',
            'edit',
            'destroy',
            'store',
            'update'
        ]
    );
    Route::resource('bpkb', BPKBController::class);
    Route::resource('stnk', STNKController::class);
});

// User Pegawai UPPD
Route::middleware(['auth', 'user-access:1|2'])->group(function () {
    Route::resource('ruangan', RuanganController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('barangkeluar', BarangKeluarController::class);
    Route::resource('kerusakan', KerusakanController::class);
    Route::resource('kehilangan', KehilanganController::class);
    Route::resource('perbaikan', PerbaikanController::class);
});

// Wajib Pajak
Route::middleware(['auth:wajibpajak,web', 'user-access:1|3|4'])->group(function () {
    Route::post('/mutasi/{mutasi}/batalkan', [MutasiController::class, 'batalkan']);
    Route::resource('mutasi', MutasiController::class)->only([
        'index',
        'show',
        'create',
        'store',
    ]);

    Route::resource('wajib-pajak', WajibPajakController::class)->only(['show']);
    Route::resource('kendaraan', KendaraanController::class)->only(['show']);
});
