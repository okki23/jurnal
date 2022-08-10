<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Akun;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Jurnal;
use App\Http\Controllers\ReportJurnal;
use App\Http\Controllers\Pengguna; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
 
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
    return view('home')->middleware('auth');
});
 
Route::get('/akun',[Akun::class,'index'])->name('akun'); 
Route::get('/akun/create',[Akun::class,'create'])->name('akun_create'); 
Route::post('/akun/store',[Akun::class,'store'])->name('akun_store'); 
Route::get('/akun/edit/{id}',[Akun::class,'edit'])->name('akun_edit'); 
Route::post('/akun/update',[Akun::class,'update'])->name('akun_update');
Route::get('/akun/destroy/{id}',[Akun::class,'destroy'])->name('akun_delete'); 

Route::get('/siswa',[Siswa::class,'index'])->name('siswa'); 
Route::get('/siswa/create',[Siswa::class,'create'])->name('siswa_create'); 
Route::post('/siswa/store',[Siswa::class,'store'])->name('siswa_store'); 
Route::get('/siswa/edit/{id}',[Siswa::class,'edit'])->name('siswa_edit'); 
Route::post('/siswa/update',[Siswa::class,'update'])->name('siswa_update');
Route::get('/siswa/destroy/{id}',[Siswa::class,'destroy'])->name('siswa_delete'); 

Route::get('/jurnal',[Jurnal::class,'index'])->name('tunjangan'); 
Route::get('/jurnal/create',[Jurnal::class,'create'])->name('tunjangan_create'); 
Route::post('/jurnal/store',[Jurnal::class,'store'])->name('tunjangan_store'); 
Route::get('/jurnal/edit/{id}',[Jurnal::class,'edit'])->name('tunjangan_edit'); 
Route::post('/jurnal/update',[Jurnal::class,'update'])->name('tunjangan_update');
Route::get('/jurnal/destroy/{id}',[Jurnal::class,'destroy'])->name('tunjangan_delete');
 
Route::get('/pengguna',[Pengguna::class,'index'])->name('pengguna'); 
Route::get('/pengguna/create',[Pengguna::class,'create'])->name('pengguna_create'); 
Route::post('/pengguna/store',[Pengguna::class,'store'])->name('pengguna_store'); 
Route::get('/pengguna/edit/{id}',[Pengguna::class,'edit'])->name('pengguna_edit'); 
Route::post('/pengguna/update',[Pengguna::class,'update'])->name('pengguna__update');
Route::get('/pengguna/destroy/{id}',[Pengguna::class,'destroy'])->name('pengguna_delete');
 

Route::get('/reportjurnal',[ReportJurnal::class,'index'])->name('rekapabsen'); 
Route::get('/reportjurnal/create',[ReportJurnal::class,'create'])->name('rekapabsen_create'); 
Route::post('/reportjurnal/store',[ReportJurnal::class,'store'])->name('rekapabsen_store'); 
Route::get('/reportjurnal/edit/{id}',[ReportJurnal::class,'edit'])->name('rekapabsen_edit'); 
Route::post('/reportjurnal/update',[ReportJurnal::class,'update'])->name('rekapabsen_update');
Route::get('/reportjurnal/print/{id}',[ReportJurnal::class,'print'])->name('rekapabsen_print');
Route::get('/reportjurnal/destroy/{id}',[ReportJurnal::class,'destroy'])->name('rekapabsen_delete');
 
Route::get('/jurnal',[Jurnal::class,'index'])->name('jurnal'); 
Route::get('/jurnal/create',[Jurnal::class,'create'])->name('jurnal_create'); 
Route::post('/jurnal/store',[Jurnal::class,'store'])->name('jurnal_store'); 
Route::get('/jurnal/edit/{id}',[Jurnal::class,'edit'])->name('jurnal_edit'); 
Route::post('/jurnal/update',[Jurnal::class,'update'])->name('jurnal_update');
Route::get('/jurnal/destroy/{id}',[Jurnal::class,'destroy'])->name('jurnal_delete');
 
  
 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
 