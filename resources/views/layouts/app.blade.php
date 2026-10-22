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

    @yield('konten')
</body>
</html>