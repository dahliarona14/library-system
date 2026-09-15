<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;

// Redirect halaman utama ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Routing tugas pertemuan 6
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/members', [MemberController::class, 'index']);