<?php

use App\Http\Controllers\ApotekController;
use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

// Rute utama aplikasi
// Ketika user mengakses URL dasar ('/'), akan menampilkan view 'welcome'.
Route::get('/', function () {
    return view('welcome');
});


// Resource Route untuk Apotek
// Secara otomatis mendaftarkan 7 rute CRUD (index, create, store, show, edit, update, destroy)
// yang mengarah ke ApotekController.
Route::resource('apotek', ApotekController::class);


// Resource Route untuk Obat
// Secara otomatis mendaftarkan 7 rute CRUD (index, create, store, show, edit, update, destroy)
// yang mengarah ke ObatController.
Route::resource('obat', ObatController::class);