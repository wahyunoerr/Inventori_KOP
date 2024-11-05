<?php

use App\Http\Controllers\KategoriController;
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
    Route::get('/kategori/delete/{id}', 'destroy')->name('kategori.destroy');
});
