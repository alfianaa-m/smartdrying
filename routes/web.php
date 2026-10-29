<?php

use Illuminate\Support\Facades\Route;

// Halaman Welcome Screen
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard Utama
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Halaman camera / AR (Bisa diakses lewat /kamera maupun /camera)
Route::get('/camera', function () {
    return view('camera');
});
Route::get('/camera', function () {
    return view('camera');
});

// Halaman Grafik Monitoring
Route::get('/grafik', function () {
    return view('grafik');
});

// Halaman Setting / Pengaturan
Route::get('/setting', function () {
    return view('setting');
});