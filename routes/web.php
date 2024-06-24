<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/absen', [AbsenController::class, 'index'])->name('absen');

Route::get('/succes', function(){
    return view('succes');
})->name('succes');

Route::get('/absen', [PegawaiController::class, 'getNip']);
Route::post('/absen/submit', [AbsenController::class, 'submit'])->name('absen.submit');
