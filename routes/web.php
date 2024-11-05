<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori', 'index')->name('kategori');
    Route::get('/kategori/create', 'create')->name('kategori.create');
    Route::post('/kategori/save', 'store')->name('kategori.store');
    Route::post('/kategori/update/{id}', 'update')->name('kategori.update');
    Route::get('/kategori/edit/{id}', 'edit')->name('kategori.edit');
    Route::delete('/kategori/delete/{id}', 'destroy')->name('kategori.destroy');
});

Route::controller(BarangController::class)->group(function () {
    Route::get('/barang', 'index')->name('barang');
    Route::get('/barang/create', 'create')->name('barang.create');
    Route::post('/barang/save', 'store')->name('barang.store');
    Route::post('/barang/update/{id}', 'update')->name('barang.update');
    Route::get('/barang/edit', 'edit')->name('barang.edit');
    Route::get('/barang/delete/{id}', 'destroy')->name('barang.destroy');
});


Route::controller(LokasiController::class)->group(function () {
    Route::get('/lokasi', 'index')->name('lokasi');
    Route::get('/lokasi/create', 'create')->name('lokasi.create');
    Route::post('/lokasi/save', 'store')->name('lokasi.store');
    Route::post('/lokasi/update/{id}', 'update')->name('lokasi.update');
    Route::get('/lokasi/edit/{id}', 'edit')->name('lokasi.edit');
    Route::delete('/lokasi/delete/{id}', 'destroy')->name('lokasi.destroy');
});

Route::controller(LaporanController::class)->group(function () {
    Route::get('/laporan', 'index')->name('laporan');
    Route::get('/laporan/create', 'create')->name('laporan.create');
    Route::post('/laporan/save', 'store')->name('laporan.store');
    Route::post('/laporan/update/{id}', 'update')->name('laporan.update');
    Route::get('/laporan/edit/{id}', 'edit')->name('laporan.edit');
    Route::get('/laporan/delete/{id}', 'destroy')->name('laporan.destroy');
});


Auth::routes();
