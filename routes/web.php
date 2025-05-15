<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

use App\Http\Controllers\TentangController;
Route::get('/tentang', [TentangController::class, 'index'])->name('halaman.tentang');

use App\Http\Controllers\GaleriController;
Route::get('/galeri', [GaleriController::class, 'index']);

use App\Http\Controllers\MenuController;
Route::get('/menu/makanan', [MenuController::class, 'makanan'])->name('menu.makanan');
Route::get('/menu/minuman', [MenuController::class, 'minuman'])->name('menu.minuman');
Route::get('/menu/cemilan', [MenuController::class, 'cemilan'])->name('menu.cemilan');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{kategori}', [MenuController::class, 'showByKategori'])->name('menu.kategori');

use App\Http\Controllers\UlasanController;
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');


