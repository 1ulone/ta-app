<?php

use App\Http\Controllers\aktivitasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/aktivitas', [aktivitasController::class, 'mahasiswa_index'])->name('dashboard.aktivitas');
