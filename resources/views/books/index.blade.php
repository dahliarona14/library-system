@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku Tersedia</h2>
    <ul>
        @foreach($books as $book)
            <li>
                <strong>{{ $book['title'] }}</strong> - {{ $book['author'] }} ({{ $book['year'] }})
                <br>
                Status: 
                @if($book['stock'] > 0)
                    <span>Tersedia (Sisa stok: {{ $book['stock'] }})</span>
                @else
                    <span>Stok sedang habis</span>
                @endif
            </li>
            <br>
        @endforeach
    </ul>
@endsection