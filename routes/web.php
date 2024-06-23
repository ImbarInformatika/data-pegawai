<?php

use App\Http\Controllers\CDaftarPegawai;
use App\Http\Controllers\CDashboard;
use App\Http\Controllers\CLanding;
use App\Http\Controllers\CLogin;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------*/

Route::get('/', [CLanding::class, 'index'])->name('landing-page');
Route::get('/login', [CLogin::class, 'index'])->name('login');
Route::post('/proses-login', [CLogin::class, 'proseslogin'])->name('proses-login');
Route::post('/logout', [CLogin::class, 'logout'])->name('logout');



Route::group(['middleware' => 'auth'], function () {


    /*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------*/

    Route::get('/dashboard', [CDashboard::class, 'index'])->name('dashboard');


    /*
|--------------------------------------------------------------------------
| DAFTAR PEGAWAI
|--------------------------------------------------------------------------*/

    Route::get('/daftar-pegawai', [CDaftarPegawai::class, 'index'])->name('daftar-pegawai');
    Route::get('/tambah', [CDaftarPegawai::class, 'tambah'])->name('tambah');
    Route::post('/prosestambah', [CDaftarPegawai::class, 'prosestambah'])->name('prosestambah');
    Route::put('/prosesubah/{id}', [CDaftarPegawai::class, 'prosesubah'])->name('prosesubah');
    Route::get('/ubah/{id}', [CDaftarPegawai::class, 'ubah'])->name('ubah');
    Route::get('/detail/{id}', [CDaftarPegawai::class, 'detail'])->name('detail');
    Route::get('/hapus/{id}', [CDaftarPegawai::class, 'hapus'])->name('hapus');
});
