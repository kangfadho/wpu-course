

<?php
// lokasi file : /routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('home');
});

Route::resource('buku', BukuController::class)->except('show');