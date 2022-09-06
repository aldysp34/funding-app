<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\KetuaBidangController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\KetuaHarianController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LembarVerifikasiController;
use App\Http\Controllers\SuratBayarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\BuktiTransferController;
use App\Http\Controllers\LpjController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Ketua Bidang Routes List */
Route::middleware(['auth', 'user-access:1'])->group(function () {
    Route::get('/ketua-bidang', [KetuaBidangController::class, 'index'])->name('ketua-bidang.home');
    Route::get('/ketua-bidang/upload_dokumen', [KetuaBidangController::class, 'upload_dokumen'])->name('ketua-bidang.upload_dokumen');
    Route::get('/ketua-bidang/dokumen/{id}/{budget}', [KetuaBidangController::class, 'dokumen'])->name('ketua-bidang.dokumen');
    Route::post('/ketua-bidang/upload', [FileController::class, 'store'])->name('ketua-bidang.store_dokumen');
    Route::get('/ketua-bidang/download_file/{id}', [FileController::class, 'downloadFile'])->name('ketua-bidang.download');
    Route::get('/ketua-bidang/download_suratbayar/{bidang}/{kategori}/{filename}', [SuratBayarController::class, 'downloadFile'])->name('ketua-bidang.download_suratBayar');
    Route::get('/ketua-bidang/cancel/{id}', [FileController::class, 'cancelSubmit'])->name('ketua-bidang.cancel');
    Route::get('/ketua-bidang/upload_lpj', [KetuaBidangController::class, 'upload_lpj'])->name('ketua-bidang.upload_lpj');
    Route::get('/ketua-bidang/view_upload_lpj/{id}', [KetuaBidangController::class, 'view_upload_lpj'])->name('ketua-bidang.view_upload_lpj');
    Route::post('/ketua-bidang/store_lpj/{id}/{data}', [LpjController::class, 'store'])->name('ketua-bidang.store_lpj');
});

/* Verifikator Routes List */
Route::middleware(['auth', 'user-access:2'])->group(function () {
    Route::get('/verifikator', [VerifikatorController::class, 'index'])->name('verifikator.home');
    Route::get('/verifikator/download_file/{id}', [FileController::class, 'downloadFile'])->name('verifikator.download');
    Route::get('/verifikator/approveRejectProposal/{id}/{data}', [VerifikatorController::class, 'approvedRejectedProposal'])->name('verifikator.approvedRejected');
    Route::post('/verifikator/upload_lembarVerifikasi/{id}/{data}', [LembarVerifikasiController::class, 'store'])->name('verifikator.upload_lembarVerifikasi');
    Route::get('/verifikator/download_lembarVerifikasi/{id}', [LembarVerifikasiController::class, 'downloadFile'])->name('verifikator.download_lembarVerifikasi');
    Route::get('/verifikator/upload_detail/{id}', [VerifikatorController::class, 'upload_detail'])->name('verifikator.upload_detail');
    Route::get('/verifikator/lpj', [VerifikatorController::class, 'dashboard_lpj'])->name('verifikator.dashboard_lpj');
    Route::get('/verifikator/lpj_reject_approve', [VerifikatorController::class, 'lpj_need_approved'])->name('verifikator.approveReject');
    Route::get('/verifikator/lpj_approved', [VerifikatorController::class, 'lpj_approved'])->name('verifikator.approvedLpj');
    Route::get('/verifikator/lpj_rejected', [VerifikatorController::class, 'lpj_rejected'])->name('verifikator.rejectedLpj');
    Route::get('/verifikator/approveRejectLpj/{id}/{data}', [VerifikatorController::class, 'approvedRejectedLpj'])->name('verifikator.approvedRejectedLpj');
    Route::get('/verifikator/download_lpj/{id}', [LpjController::class, 'downloadFile'])->name('verifikator.download_lpj');
});

/* Bendahara Routes List */
Route::middleware(['auth', 'user-access:3'])->group(function () {
    Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara.home');
    Route::get('/bendahara/download_file/{id}', [FileController::class, 'downloadFile'])->name('bendahara.download');
    Route::get('/bendahara/download_lembarVerifikasi/{id}', [LembarVerifikasiController::class, 'downloadFile'])->name('bendahara.download_lembarVerifikasi');
    Route::post('/bendahara/upload_suratbayar/{id}/{data}', [SuratBayarController::class, 'store'])->name('bendahara.upload_suratBayar');
    Route::get('/bendahara/download_suratbayar/{bidang}/{kategori}/{filename}', [SuratBayarController::class, 'downloadFile'])->name('bendahara.download_suratBayar');
    Route::get('/bendahara/transfer', [BendaharaController::class, 'transfer'])->name('bendahara.transfer');
    Route::get('/bendahara/upload_transfer', [BendaharaController::class, 'bukti'])->name('bendahara.uploadTF');
    Route::post('/bendahara/upload_bukti', [BuktiTransferController::class, 'store'])->name('bendahara.uploadBukti');
    Route::get('/bendahara/download_bukti/{id}', [BuktiTransferController::class, 'download'])->name('bendahara.download_bukti');
});

/* Ketua Harian Routes List */
Route::middleware(['auth', 'user-access:4'])->group(function () {
    Route::get('/ketua-harian', [KetuaHarianController::class, 'index'])->name('ketua-harian.home');
    Route::get('/ketua-harian/download_file/{id}', [FileController::class, 'downloadFile'])->name('ketua-harian.download');
    Route::get('/ketua-harian/download_lembarVerifikasi/{id}', [LembarVerifikasiController::class, 'downloadFile'])->name('ketua-harian.download_lembarVerifikasi');
    Route::get('/ketua-harian/download_suratbayar/{bidang}/{kategori}/{filename}', [SuratBayarController::class, 'downloadFile'])->name('ketua-harian.download_suratBayar');
    Route::get('/ketua-harian/approveRejectProposal/{id}/{data}', [KetuaHarianController::class, 'approvedRejectedProposal'])->name('ketua-harian.approvedRejected');
    Route::get('/ketua-harian/lpj', [KetuaHarianController::class, 'dashboard_lpj'])->name('ketua-harian.dashboard_lpj');
    Route::get('/ketua-harian/lpj_reject_approve', [KetuaHarianController::class, 'lpj_need_approved'])->name('ketua-harian.approveReject');
    Route::get('/ketua-harian/lpj_approved', [KetuaHarianController::class, 'lpj_approved'])->name('ketua-harian.approvedLpj');
    Route::get('/ketua-harian/lpj_rejected', [KetuaHarianController::class, 'lpj_rejected'])->name('ketua-harian.rejectedLpj');
    Route::get('/ketua-harian/approveRejectLpj/{id}/{data}', [KetuaHarianController::class, 'approvedRejectedLpj'])->name('ketua-harian.approvedRejectedLpj');
    Route::get('/ketua-harian/download_lpj/{id}', [LpjController::class, 'downloadFile'])->name('ketua-harian.download_lpj');
});

/* Admin Routes List */
Route::middleware(['auth', 'user-access:5'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bidang', [AdminController::class, 'bidang'])->name('admin.bidang');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/admin/files', [AdminController::class, 'files'])->name('admin.files');
    Route::post('/admin/adduser', [UserController::class, 'store'])->name('admin.store_user');
    Route::post('/admin/add_bidang', [BidangController::class, 'store'])->name('admin.store_bidang');
    Route::post('/admin/hapus_bidang/{id}', [BidangController::class, 'destroy'])->name('admin.destroy_bidang');
    Route::post('/admin/hapus_user/{id}', [UserController::class, 'destroy'])->name('admin.destroy_user');
    Route::post('/admin/hapus_file/{id}', [FileController::class, 'destroy'])->name('admin.destroy_file');
    Route::get('/admin/kegiatan', [AdminController::class, 'kegiatan'])->name('admin.kegiatan');
    Route::post('/admin/add_kegiatan', [KegiatanController::class, 'store'])->name('admin.store_kegiatan');
    Route::get('/admin/list_kategori/{id}', [AdminController::class, 'list_kategori'])->name('admin.get_kategori');
});
