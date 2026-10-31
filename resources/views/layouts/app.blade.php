<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Library System</title>
</head>
<body>

    <header>
        <h1>Library System</h1>

        @auth
            <p>Halo, {{ Auth::user()->name }}</p>
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px; margin-bottom: 15px;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth

        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a> |
            <a href="{{ route('books.index') }}">Books</a> |
            <a href="{{ route('categories.index') }}">Categories</a> |
            <a href="{{ route('members.index') }}">Members</a>
        </nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; 2026 Library System - Dahlia Rona</p>
    </footer>

</body>
</html>
