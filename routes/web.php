<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\KetuaBidangController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Ketua Bidang Route List */
Route::middleware(['auth', 'user-access:1'])->group(function () {
    Route::get('/ketua-bidang/home', [KetuaBidangController::class, 'index'])->name('ketua-bidang.home');
});

/* Verifikator Route List */
Route::middleware(['auth', 'user-access:2'])->group(function () {
    Route::get('/verifikator/home', [VerifikatorController::class, 'index'])->name('verifikator.home');
});
