<!-- lokasi file : /routes/web.php -->

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('home');
});


Route::get('/buku', [BukuController::class, 'index']);