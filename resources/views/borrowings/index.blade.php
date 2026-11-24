@extends('layouts.app')
@section('title', 'Data Peminjaman')

@section('content')
<h2>Data Peminjaman</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<a href="{{ route('borrowings.create') }}">Tambah Peminjaman</a>

<table border="1" cellpadding="9" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($borrowings as $borrowing)
            @foreach($borrowing->details as $detail)
                <tr>
                    <td>{{ $loop->parent->iteration }}</td>
                    <td>{{ $borrowing->member->name }}</td>
                    <td>{{ $detail->book->title }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $borrowing->borrowing_date }}</td>
                    <td>{{ $borrowing->due_date }}</td>
                    <td>{{ $borrowing->return_date ?? '-' }}</td>
                    <td>{{ $borrowing->status }}</td>
                    <td>
                        @if($borrowing->status == 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST">
                                @csrf
                                <button type="submit">Kembalikan</button>
                            </form>
                        @else
                            Sudah dikembalikan
                        @endif
                    </td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="8">Belum ada transaksi peminjaman.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
