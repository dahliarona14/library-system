<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data buku menggunakan Eloquent
        $books = Book::all(); 

        // Mengirim data ke view resources/views/books/index.blade.php
        return view('books.index', compact('books'));
    }
}