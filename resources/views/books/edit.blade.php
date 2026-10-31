@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

    <h2>Edit Data Buku</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul Buku</label><br>
        <input type="text" name="title"
            value="{{ old('title', $book->title) }}">
        @error('title') <p style="color:red">{{ $message }}</p> @enderror
        <br>

        <label>Penulis</label><br>
        <input type="text" name="author"
            value="{{ old('author', $book->author) }}">
        @error('author') <p style="color:red">{{ $message }}</p> @enderror
        <br>

        <label>Tahun</label><br>
        <input type="number" name="year"
            value="{{ old('year', $book->year) }}">
        @error('year') <p style="color:red">{{ $message }}</p> @enderror
        <br>

        <label>Stok</label><br>
        <input type="number" name="stock"
            value="{{ old('stock', $book->stock) }}">
        @error('stock') <p style="color:red">{{ $message }}</p> @enderror
        <br>

        <label for="category_id">Kategori</label><br>

        <select name="category_id" id="category_id" required>
            <option value="">Pilih kategori</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}
                </option>
            @endforeach
        </select>

        @error('category_id')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Update Buku</button>
        <a href="{{ route('books.index') }}">Kembali</a>

    </form>

@endsection
