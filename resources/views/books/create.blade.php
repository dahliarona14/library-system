
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label>Judul Buku</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <p>{{ $message }}</p> @enderror
        <br><br>

        <label>Penulis</label><br>
        <input type="text" name="author" value="{{ old('author') }}">
        @error('author') <p>{{ $message }}</p> @enderror
        <br><br>

        <label>Tahun</label><br>
        <input type="number" name="year" value="{{ old('year') }}">
        @error('year') <p>{{ $message }}</p> @enderror
        <br><br>

        <label>Stok</label><br>
        <input type="number" name="stock" value="{{ old('stock') }}">
        @error('stock') <p>{{ $message }}</p> @enderror
        <br><br>

        <label for="category_id">Kategori</label><br>
        <select name="category_id" id="category_id" required>
            <option value="">Pilih kategori</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}
                </option>
            @endforeach
        </select>

        @error('category_id') <p style="color: red;">{{ $message }}</p> @enderror
        <br><br>

        <button type="submit">Simpan Buku</button>
        <a href="{{ route('books.index') }}">Kembali</a>
    </form>
</body>
</html>
