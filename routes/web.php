<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\KetuaBidangController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\KetuaHarianController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LembarVerifikasiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Ketua Bidang Routes List */
Route::middleware(['auth', 'user-access:1'])->group(function () {
    Route::get('/ketua-bidang', [KetuaBidangController::class, 'index'])->name('ketua-bidang.home');
    Route::get('/ketua-bidang/upload_dokumen', [KetuaBidangController::class, 'upload_dokumen'])->name('ketua-bidang.upload_dokumen');
    Route::post('/ketua-bidang/upload_dokumen', [FileController::class, 'store'])->name('ketua-bidang.store_dokumen');
    Route::get('/ketua-bidang/download_file/{filename}', [FileController::class, 'downloadFile'])->name('ketua-bidang.download');
});

/* Verifikator Routes List */
Route::middleware(['auth', 'user-access:2'])->group(function () {
    Route::get('/verifikator', [VerifikatorController::class, 'index'])->name('verifikator.home');
    Route::get('/verifikator/download_file/{filename}', [FileController::class, 'downloadFile'])->name('verifikator.download');
    Route::get('/verifikator/approveRejectProposal/{id}/{data}', [VerifikatorController::class, 'approvedRejectedProposal'])->name('verifikator.approvedRejected');
    Route::post('/verifikator/upload_lembarVerifikasi/{id}/{data}', [LembarVerifikasiController::class, 'store'])->name('verifikator.upload_lembarVerifikasi');
    Route::get('/verifikator/download_lembarVerifikasi/{filename}', [LembarVerifikasiController::class, 'downloadFile'])->name('verifikator.download_lembarVerifikasi');
});

/* Bendahara Routes List */
Route::middleware(['auth', 'user-access:3'])->group(function () {
    Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara.home');
});

/* Ketua Harian Routes List */
Route::middleware(['auth', 'user-access:4'])->group(function () {
    Route::get('/ketua-harian', [KetuaHarianController::class, 'index'])->name('ketua-harian.home');
});
