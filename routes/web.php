<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

// Menghasilkan route CRUD lengkap
Route::resource('books', BookController::class);