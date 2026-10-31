@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

    <h2>Daftar Buku</h2>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('books.create') }}">Tambah Buku Baru</a>

    <br><br>

    @foreach($books as $book)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">

            <p>Judul: {{ $book->title }}</p>

            <p>Penulis: {{ $book->author }}</p>

            <p>Tahun: {{ $book->year }}</p>

            <p>Stok: {{ $book->stock }}</p>

            <p>Kategori:
                {{ $book->category?->nama ?? 'Belum ada kategori' }}
            </p>

            <a href="{{ route('books.edit', $book) }}">Edit</a>

            <form action="{{ route('books.destroy', $book) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit">Hapus</button>
            </form>

        </div>
    @endforeach

@endsection
