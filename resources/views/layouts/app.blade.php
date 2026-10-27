<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Artikel</title>
</head>
<body>
    <h1>Manajemen Artikel</h1>

    @if (session('pesan'))
        <div style="background:#d1fae5; padding:10px; margin-bottom:10px;">
            {{ session('pesan') }}
        </div>
    @endif

    <hr>

    <nav>
        <a href="{{ route('artikel.index') }}">Artikel</a>

        @auth
            <span>Halo, {{ auth()->user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Daftar</a>
        @endauth
    </nav>

    <hr>

    @yield('konten')
</body>
</html>