<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Judul:</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <p style="color: red; margin: 0;">{{ $message }}</p>
            @enderror
            <br>
        </div>
        
        <div>
            <label>Penulis:</label><br>
            <input type="text" name="author" value="{{ old('author') }}">
            @error('author')
                <p style="color: red; margin: 0;">{{ $message }}</p>
            @enderror
            <br>
        </div>
        
        <div>
            <label>Tahun:</label><br>
            <input type="number" name="year" value="{{ old('year') }}">
            @error('year')
                <p style="color: red; margin: 0;">{{ $message }}</p>
            @enderror
            <br>
        </div>
        
        <div>
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <p style="color: red; margin: 0;">{{ $message }}</p>
            @enderror
            <br><br>
        </div>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>