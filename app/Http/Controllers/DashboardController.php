<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Library System Dashboard';
        $description = 'Selamat datang di Sistem Informasi Perpustakaan Sederhana.';

        $totalBooks = Book::count();
        $totalMembers = User::count();
        $totalCategories = Category::count();

        return view('dashboard.index', compact(
            'title',
            'description',
            'totalBooks',
            'totalMembers',
            'totalCategories'
        ));
    }
}
