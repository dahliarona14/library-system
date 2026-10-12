<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="title"><br>
        
        <label>Penulis:</label><br>
        <input type="text" name="author"><br>
        
        <label>Tahun:</label><br>
        <input type="number" name="year"><br>
        
        <label>Stok:</label><br>
        <input type="number" name="stock"><br><br>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>