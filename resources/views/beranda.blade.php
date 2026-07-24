<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oebetstyle | Home</title>
    <style>
        * { box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { margin: 0; padding: 0; background: #f4f4f4; }
        header { background: #000; color: #fff; padding: 30px; text-align: center; letter-spacing: 3px; }
        nav { background: #fff; padding: 15px; text-align: center; border-bottom: 2px solid #ddd; position: sticky; top: 0; z-index: 100; }
        nav a { margin: 0 20px; text-decoration: none; color: #333; font-weight: bold; }
        nav a:hover { color: #d35400; }
        .container { max-width: 1100px; margin: 30px auto; padding: 0 20px; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px; }
        .product-card { background: white; border-radius: 10px; overflow: hidden; text-align: center; padding-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .product-card img { width: 100%; height: 300px; object-fit: cover; }
        .product-card h3 { font-size: 1.1rem; margin: 15px 0 5px; color: #222; }
        .price { color: #d35400; font-weight: bold; font-size: 1.2rem; }
        footer { background: #000; color: white; text-align: center; padding: 20px; margin-top: 40px; }
    </style>
</head>
<body>

<header><h1>OEBETSTYLE</h1></header>

<nav>
    <a href="{{ url('/') }}"><b>BERANDA</b></a>
    <a href="{{ url('/profil') }}">PROFIL</a>
    <a href="{{ url('/kontak') }}">KONTAK</a>
    <a href="{{ url('/input') }}">FORMULIR</a>
    <a href="{{ url('/tampil') }}" style="color: #2980b9;">LIHAT DATA</a>
</nav>

<div class="container">
    <h2 style="text-align: center; margin-bottom: 30px;">Katalog Produk Terbaru</h2>
    <div class="product-grid">
        <div class="product-card">
            <img src="{{ asset('gambar/hoodie.jpg') }}" alt="Produk 1">
            <h3>Hoodie</h3>
            <p class="price">Rp 325.000</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('gambar/tshirt.jpg') }}" alt="Produk 2">
            <h3>Black T-Shirt</h3>
            <p class="price">Rp 155.000</p>
        </div>
        <div class="product-card">
            <img src="{{ asset('gambar/chino.jpg') }}" alt="Produk 3">
            <h3>Casual Chino Grey</h3>
            <p class="price">Rp 280.000</p>
        </div>
    </div>
</div>

<footer>&copy; 2026 Oebetstyle Official Store</footer>

</body>
</html>