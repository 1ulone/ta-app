<?php

use App\Http\Controllers\aktivitasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* 
buat akses fungsi controller dan ngeliat view pake file ini
tinggal pake kode gini
Route::get('destinasi file view', [nama Controller::class, 'nama fungsi'])->name('nama rute ini buat nanti dipanggil di controller');
---------------------------------------------------------------------------------------------------------------------
*contoh destinasi file view = 
misal file yang dituju aktivitas.blade.php ada di folder dashboard, berarti nulisnya '/dashboard/aktivitas'
---------------------------------------------------------------------------------------------------------------------
*contoh nama rute = bebas tapi kalo mau ada 2 kalimat dipisah pake '.'
*/

Route::get('/dashboard/aktivitas', [aktivitasController::class, 'mahasiswa_index'])->name('dashboard.aktivitas');