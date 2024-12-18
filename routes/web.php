<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HartakeluarController;
use App\Http\Controllers\HartaMasukController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Auth::routes([
    'password.confirm' => false,
    'password.email' => false,
    'password.request' => false,
    'password.reset' => false,
    'password.update' => false,
    'register' => false,
]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['role:sekretaris|ketua Koperasi']);

Route::middleware(['auth', 'role:sekretaris'])->group(function () {
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
        Route::get('/barang/edit/{id}', 'edit')->name('barang.edit');
        Route::delete('/barang/delete/{id}', 'destroy')->name('barang.destroy');
    });

    Route::controller(HartaMasukController::class)->group(function () {
        Route::get('/hartaMasuk', 'index')->name('hartaMasuk');
        Route::get('/hartaMasuk/create', 'create')->name('hartaMasuk.create');
        Route::post('/hartaMasuk/save', 'store')->name('hartaMasuk.store');
        Route::post('/hartaMasuk/update/{id}', 'update')->name('hartaMasuk.update');
        Route::get('/hartaMasuk/edit/{id}', 'edit')->name('hartaMasuk.edit');
        Route::delete('/hartaMasuk/delete/{id}', 'destroy')->name('hartaMasuk.destroy');
    });

    Route::controller(HartakeluarController::class)->group(function () {
        Route::get('/hartaKeluar', 'index')->name('hartaKeluar');
        Route::get('/hartaKeluar/create', 'create')->name('hartaKeluar.create');
        Route::post('/hartaKeluar/save', 'store')->name('hartaKeluar.store');
        Route::post('/hartaKeluar/update/{id}', 'update')->name('hartaKeluar.update');
        Route::get('/hartaKeluar/edit/{id}', 'edit')->name('hartaKeluar.edit');
        Route::delete('/hartaKeluar/delete/{id}', 'destroy')->name('hartaKeluar.destroy');
    });

    Route::controller(LokasiController::class)->group(function () {
        Route::get('/lokasi', 'index')->name('lokasi');
        Route::get('/lokasi/create', 'create')->name('lokasi.create');
        Route::post('/lokasi/save', 'store')->name('lokasi.store');
        Route::post('/lokasi/update/{id}', 'update')->name('lokasi.update');
        Route::get('/lokasi/edit/{id}', 'edit')->name('lokasi.edit');
        Route::delete('/lokasi/delete/{id}', 'destroy')->name('lokasi.destroy');
    });
});

Route::middleware(['auth', 'role:sekretaris|ketua'])->group(function () {
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporan', 'index')->name('laporan');
        Route::get('/laporan.index', 'index')->name('laporan.index');
        Route::get('/laporan/delete/{id}', 'destroy')->name('laporan.destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user');
        Route::get('/laporan/invoice/{id}', [LaporanController::class, 'generatePDF'])->name(name: 'laporan.invoice');
    });
});
