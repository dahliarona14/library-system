<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Jangan lupa import Model Book

class BookController extends Controller
{
    // READ - Menampilkan daftar buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // CREATE - Menampilkan form tambah
    public function create()
    {
        return view('books.create');
    }

    // STORE - Menyimpan data baru
    public function store(Request $request)
{
    // 1. Proses Validasi (Satpam)
    $validated = $request->validate([
    // Aturan baru 'unique:books,title' mencegah adanya judul buku yang sama di database
    'title'  => 'required|string|max:255|unique:books,title', 
    'author' => 'required|string|max:255',
    // Aturan baru 'digits:4' memastikan input tahun harus pas berjumlah 4 angka
    'year'   => 'required|integer|digits:4|min:1900',         
    'stock'  => 'required|integer|min:0',
]);

    // 2. Jika lolos validasi, simpan ke database
    // Variabel $validated hanya berisi data yang sudah aman.
    Book::create($validated);

    // 3. Kembali ke halaman utama (index) dengan pesan sukses
    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil ditambahkan.');
}

    // UPDATE - Menampilkan form edit (Menggunakan Route Model Binding)
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE - Menyimpan perubahan
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);
        return redirect()->route('books.index');
    }

    // DELETE - Menghapus data
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}