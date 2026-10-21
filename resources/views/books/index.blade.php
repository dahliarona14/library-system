<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>
    @if (session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif

    <h1>Daftar Buku</h1>
    <a href="{{ route('books.create') }}">Tambah Buku Baru</a>
    <br><br>

    @foreach($books as $book)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <p>Judul: {{ $book->title }}</p>
            <p>Penulis: {{ $book->author }}</p>
            <p>Kategori: {{ $book->category?->nama ?? 'Belum ada kategori' }}</p>
            
            <a href="{{ route('books.edit', $book) }}">Edit</a>

            <!-- Form Delete -->
            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    @endforeach
</body>
</html>