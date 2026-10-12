<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Data Buku</h1>
    
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Judul:</label><br>
        <input type="text" name="title" value="{{ $book->title }}"><br>
        
        <label>Penulis:</label><br>
        <input type="text" name="author" value="{{ $book->author }}"><br>
        
        <label>Tahun:</label><br>
        <input type="number" name="year" value="{{ $book->year }}"><br>
        
        <label>Stok:</label><br>
        <input type="number" name="stock" value="{{ $book->stock }}"><br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>