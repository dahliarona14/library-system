@extends('layouts.app')
@section('title', 'Tambah Peminjaman')

@section('content')
<h2>Tambah Peminjaman</h2>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('borrowings.store') }}" method="POST">
    @csrf

    <label>Anggota</label>
    <select name="member_id" required>
        <option value="">Pilih Anggota</option>
        @foreach($members as $member)
            <option value="{{ $member->id }}">{{ $member->name }}</option>
        @endforeach
    </select>

    <br><br>

    <label>Buku</label>
    <select name="book_id" required>
        <option value="">Pilih Buku</option>
        @foreach($books as $book)
            <option value="{{ $book->id }}">
                {{ $book->title }} (Stok: {{ $book->stock }})
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Jumlah</label>
    <input type="number" name="quantity" min="1" value="1" required>

    <br><br>

    <button type="submit">Simpan Peminjaman</button>
    <a href="{{ route('borrowings.index') }}">Kembali</a>
</form>
@endsection
