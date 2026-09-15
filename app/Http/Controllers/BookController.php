<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            ['title' => 'Pemrograman PHP Modern', 'author' => 'Budi Raharjo', 'year' => 2021, 'stock' => 5],
            ['title' => 'Laravel untuk Pemula', 'author' => 'Eko Kurniawan', 'year' => 2023, 'stock' => 0],
            ['title' => 'Basis Data Relasional', 'author' => 'Fathansyah', 'year' => 2020, 'stock' => 3],
            ['title' => 'Algoritma dan Struktur Data', 'author' => 'Rinaldi Munir', 'year' => 2019, 'stock' => 7],
            ['title' => 'Rekayasa Perangkat Lunak', 'author' => 'Rosa A.S.', 'year' => 2022, 'stock' => 2],
        ];

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}