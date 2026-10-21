<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Data Buku</h1>
    
    <form action="{{ route('books.update', $book->id) }}" method="POST">
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
        
        
<label for="category_id">Kategori</label>

<select name="category_id" id="category_id">
    <option value="">Pilih kategori</option>

    @foreach ($categories as $category)
        <option
            value="{{ $category->id }}"
            @selected(old('category_id', $book->category_id) == $category->id)
        >
            {{ $category->nama }}
        </option>
    @endforeach
</select>

@error('category_id')
    <p>{{ $message }}</p>
@enderror

        <button type="submit">Update</button>
    </form>
</body>
</html>