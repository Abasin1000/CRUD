<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Kledingwinkel</title>
</head>
<body>
    <nav>
        <a href="{{ route('products.index') }}">📦 Producten</a> |
        <a href="{{ route('products.create') }}">➕ Nieuw Product</a>
    </nav>

    <hr>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
