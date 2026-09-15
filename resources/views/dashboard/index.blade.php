@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>

    <h3>Statistik Data:</h3>
    <ul>
        <li>Total Koleksi Buku: {{ $totalBooks }} judul</li>
        <li>Total Anggota Aktif: {{ $totalMembers }} orang</li>
        <li>Total Kategori Buku: {{ $totalCategories }} kategori</li>
    </ul>
@endsection