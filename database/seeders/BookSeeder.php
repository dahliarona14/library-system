<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create(['title' => 'Pemrograman PHP', 'author' => 'Andi', 'year' => 2024, 'stock' => 5]);
        Book::create(['title' => 'Laravel untuk Pemula', 'author' => 'Budi', 'year' => 2023, 'stock' => 10]);
        Book::create(['title' => 'Basis Data Relasional', 'author' => 'Citra', 'year' => 2022, 'stock' => 7]);
        Book::create(['title' => 'Sistem Informasi Manajemen', 'author' => 'Dian', 'year' => 2025, 'stock' => 3]);
        Book::create(['title' => 'Belajar UI/UX', 'author' => 'Eko', 'year' => 2024, 'stock' => 8]);
    }
}