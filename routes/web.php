<?php

use App\Models\User;
use App\Models\Agenda;
use App\Models\Absensi;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\DokumenLainnya;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DokumenLainnyaController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home',
        'suratmasuk' => SuratMasuk::count(),
        'suratkeluar' => SuratKeluar::count(),
        'dokumen' => DokumenLainnya::count(),
        'absensi' => Absensi::count(),
        'agenda' => Agenda::all()
    ]);
})->middleware('auth');

Route::get('/profil', function () {
    return view('profil', [
        'title' => 'Profil'
    ]);
})->middleware('auth');

Route::resource('/user', UserController::class)->middleware('admin');
Route::get('/surat-masuk/checkSlug', [SuratMasukController::class, 'checkSlug'])->middleware('auth');
Route::resource('/surat-masuk', SuratMasukController::class)->middleware('auth');
Route::resource('/lainnya', DokumenLainnyaController::class)->middleware('auth');
Route::resource('/surat-keluar', SuratKeluarController::class)->middleware('auth');
Route::resource('/agenda', AgendaController::class)->middleware('auth');
Route::resource('/absensi', AbsensiController::class)->middleware('auth');


Route::get('/profil', function () {
    return view('profil', [
        'title' => 'Profil',
        'user' => User::find(Auth()->user()->id)
    ]);
});

Route::get('/arsip', function () {
    return view('arsip', [
        'title' => 'Arsip'
    ]);
})->middleware('auth');

Route::get('/pengajuan', function () {
    return view('pengajuan', [
        'title' => 'Pengajuan'
    ]);
})->middleware('auth');
