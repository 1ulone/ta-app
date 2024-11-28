<?php

use App\Http\Controllers\aktivitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\proposalsController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

// Form upload proposal
Route::get('/proposal/upload', [proposalsController::class, 'formUpload'])->name('proposal.upload');

// Proses upload proposal
Route::post('/proposal/upload', [proposalsController::class, 'upload'])->name('proposal.upload.post');

// Review proposal oleh koordinator
Route::get('/proposal/review', [proposalsController::class, 'review'])->name('proposal.review');

// Menampilkan jadwal aktivitas di dashboard mahasiswa
Route::get('/dashboard/aktivitas_mahasiswa', [AktivitasController::class, 'jadwalMahasiswa'])->name('dashboard.aktivitas.mahasiswa');

// Menampilkan jadwal aktivitas di dashboard dosen
Route::get('/dashboard/aktivitas_dosen', [AktivitasController::class, 'jadwalDosen'])->name('dashboard.aktivitas.dosen');

// Menampilkan dokumen tertentu
Route::get('/dokumen/show', [DokumenController::class, 'show'])->name('dokumen.show');

// Menambahkan dokumen
Route::post('/dokumen/store', [DokumenController::class, 'store'])->name('dokumen.store');

// Menampilkan daftar koordinator
Route::get('/koordinator/index', [UsersController::class, 'index'])->name('koordinator.index');

// Menampilkan detail koordinator
Route::get('/koordinator/detail', [UsersController::class, 'show'])->name('koordinator.detail');

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