<?php

use App\Http\Controllers\Auth\RegisterPetaniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosisPupukTumbuhController;
use App\Http\Controllers\JenisPupukTumbuhController;
use App\Http\Controllers\KarakteristikTanamanTumbuhController;
use App\Http\Controllers\KondisiIklimTumbuhController;
use App\Http\Controllers\PhTanahTumbuhController;
use App\Http\Controllers\RekomendasiTumbuhController;
use App\Http\Controllers\RulesTumbuhController;
use App\Http\Controllers\UsiaCabaiTumbuhController;
use App\Http\Controllers\DosisPupukPanenController;
use App\Http\Controllers\JenisPupukPanenController;
use App\Http\Controllers\KarakteristikTanamanPanenController;
use App\Http\Controllers\KondisiIklimPanenController;
use App\Http\Controllers\PhTanahPanenController;
use App\Http\Controllers\RekomendasiPanenController;
use App\Http\Controllers\RulesPanenController;
use App\Http\Controllers\UsiaCabaiPanenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetaniController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::post('/rekomendasi', [RekomendasiTumbuhController::class, 'getRekomendasi'])->name('rekomendasi');
Route::get('/rekomendasi-tumbuh/create', [RekomendasiTumbuhController::class, 'create'])->name('rekomendasi-tumbuh.create');
Route::post('/rekomendasi-tumbuh', [RekomendasiTumbuhController::class, 'store'])->name('rekomendasi-tumbuh.store');
Route::get('/rekomendasi-tumbuh/{id}', [RekomendasiTumbuhController::class, 'show'])->name('rekomendasi-tumbuh.show');
Route::get('/rekomendasi-tumbuh-admin', [RekomendasiTumbuhController::class, 'indexAdmin'])->name('rekomendasi-tumbuh-admin');
Route::delete('/rekomendasi-tumbuh/{id}', [RekomendasiTumbuhController::class, 'destroy'])->name('rekomendasi-tumbuh.destroy');

Route::get('/rekomendasi-panen/create', [RekomendasiPanenController::class, 'create'])->name('rekomendasi-panen.create');
Route::post('/rekomendasi-panen', [RekomendasiPanenController::class, 'store'])->name('rekomendasi-panen.store');
Route::get('/rekomendasi-panen/{id}', [RekomendasiPanenController::class, 'show'])->name('rekomendasi-panen.show');
Route::get('/rekomendasi-panen-admin', [RekomendasiPanenController::class, 'indexAdmin'])->name('rekomendasi-panen-admin');
Route::delete('/rekomendasi-panen/{id}', [RekomendasiPanenController::class, 'destroy'])->name('rekomendasi-panen.destroy');
Route::get('register-petani', [RegisterPetaniController::class, 'showRegistrationForm'])->name('register_petani');
Route::post('register-petani', [RegisterPetaniController::class, 'register']);
Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    //Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('user', UserController::class);
    Route::get('/cetak-laporan-rekomendasi-tumbuh', [RekomendasiTumbuhController::class, 'cetakLaporan'])->name('cetak.laporan.rekomendasi.tumbuh');
    Route::get('/cetak-laporan-rekomendasi-panen', [RekomendasiPanenController::class, 'cetakLaporan'])->name('cetak.laporan.rekomendasi.panen');

    Route::get('/cetak-laporan-rules-tumbuh', [RulesTumbuhController::class, 'cetakLaporan'])->name('cetak.laporan.rules.tumbuh');
    Route::get('/cetak-laporan-rules-panen', [RulesPanenController::class, 'cetakLaporan'])->name('cetak.laporan.rules.panen');

    Route::get('/cetak-laporan-dosis-panen', [DosisPupukPanenController::class, 'cetakLaporan'])->name('cetak.laporan.dosis.panen');
    Route::get('/cetak-laporan-dosis-tumbuh', [DosisPupukTumbuhController::class, 'cetakLaporan'])->name('cetak.laporan.dosis.tumbuh');

    Route::get('/cetak-laporan-petani', [PetaniController::class, 'cetakLaporan'])->name('cetak.laporan.petani');
    Route::get('/cetak-laporan-jenis-pupuk-tumbuh', [JenisPupukTumbuhController::class, 'cetakLaporan'])->name('cetak.laporan.jenis.pupuk.tumbuh');
    Route::get('/cetak-laporan-jenis-pupuk-panen', [JenisPupukPanenController::class, 'cetakLaporan'])->name('cetak.laporan.jenis.pupuk.panen');

    Route::get('/cetak-laporan-karakteristik-tanaman-tumbuh', [KarakteristikTanamanTumbuhController::class, 'cetakLaporan'])->name('cetak.laporan.karakteristik.tanaman.tumbuh');
    Route::get('/cetak-laporan-karakteristik-tanaman-panen', [KarakteristikTanamanPanenController::class, 'cetakLaporan'])->name('cetak.laporan.karakteristik.tanaman.panen');


    Route::resource('usia-cabai-tumbuh', UsiaCabaiTumbuhController::class);
    Route::resource('ph-tanah-tumbuh', PhTanahTumbuhController::class);
    Route::resource('kondisi-iklim-tumbuh', KondisiIklimTumbuhController::class);
    Route::resource('karakteristik-tanaman-tumbuh', KarakteristikTanamanTumbuhController::class);
    Route::resource('jenis-pupuk-tumbuh', JenisPupukTumbuhController::class);
    Route::resource('dosis-pupuk-tumbuh', DosisPupukTumbuhController::class);
    Route::resource('rules-tumbuh', RulesTumbuhController::class);



    Route::resource('usia-cabai-panen', UsiaCabaiPanenController::class);
    Route::resource('ph-tanah-panen', PhTanahPanenController::class);
    Route::resource('kondisi-iklim-panen', KondisiIklimPanenController::class);
    Route::resource('karakteristik-tanaman-panen', KarakteristikTanamanPanenController::class);
    Route::resource('jenis-pupuk-panen', JenisPupukPanenController::class);
    Route::resource('dosis-pupuk-panen', DosisPupukPanenController::class);
    Route::resource('rules-panen', RulesPanenController::class);

    Route::get('/riwayat-rekomendasi-panen', [RekomendasiPanenController::class, 'riwayat'])->name('riwayat-panen.rekomendasi');
    Route::get('/riwayat-rekomendasi-panen/{id}/hasil', [RekomendasiPanenController::class, 'lihatHasil'])->name('riwayat-panen.rekomendasi.hasil');

    Route::get('/riwayat-rekomendasi-tumbuh', [RekomendasiTumbuhController::class, 'riwayat'])->name('riwayat-tumbuh.rekomendasi');
    Route::get('/riwayat-rekomendasi-tumbuh/{id}/hasil', [RekomendasiTumbuhController::class, 'lihatHasil'])->name('riwayat-tumbuh.rekomendasi.hasil');
    Route::get('/riwayat-rekomendasi-panen', [RekomendasiPanenController::class, 'riwayatPetani'])->name('riwayat-rekomendasi-panen');

    Route::get('/riwayat-rekomendasi-tumbuh', [RekomendasiTumbuhController::class, 'riwayatPetani'])->name('riwayat-rekomendasi-tumbuh');
    Route::get('/rekomendasi-tumbuh/{id}/cetak', [RekomendasiTumbuhController::class, 'cetak'])->name('rekomendasi-tumbuh.cetak');
    Route::get('/rekomendasi-panen/{id}/cetak', [RekomendasiPanenController::class, 'cetak'])->name('rekomendasi-panen.cetak');

    Route::resource('petani', PetaniController::class);
});

Route::group(['middleware' => ['auth', 'leveluser:user']], function () {
});

// Route::group(['middleware' => ['auth', 'leveluser:operator']], function () {
// 

// });


Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name(('postlogin'));
Route::get('/logout', [LoginController::class, 'logout'])->name(('logout'));

// Route::get('login', function () {
//     return view('auth.login');
// })->name('login')->middleware('guest');

// Route::post('login', [LoginController::class, 'postlogin'])->middleware('guest');

// // Rute untuk logout
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');