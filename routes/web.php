<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('borrowings', BorrowingController::class)
        ->only(['index', 'create', 'store']);

        Route::post('/borrowings/{id}/return', [BorrowingController::class, 'returnBook'])
            ->name('borrowings.return');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('books', BookController::class);

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/members', [MemberController::class, 'index'])
        ->name('members.index');

    Route::middleware('can:manage-users')->group(function () {
        Route::resource('users', UserController::class);
    });
});
