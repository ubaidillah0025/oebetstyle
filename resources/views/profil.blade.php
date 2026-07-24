<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil | Oebetstyle</title>
    <style>
        * { box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { margin: 0; background: #f4f4f4; }
        header { background: #000; color: #fff; padding: 30px; text-align: center; letter-spacing: 3px; }
        nav { background: #fff; padding: 15px; text-align: center; border-bottom: 2px solid #ddd; }
        nav a { margin: 0 20px; text-decoration: none; color: #333; font-weight: bold; }
        .content { max-width: 800px; margin: 50px auto; padding: 0 20px; text-align: center; }
        .profile-img { width: 100%; border-radius: 15px; filter: grayscale(50%); margin-bottom: 25px; }
        .vision-box { background: #f9f9f9; border-left: 5px solid #2c3e50; padding: 20px; text-align: left; margin-top: 30px; }
    </style>
</head>
<body>

<header><h1>PROFIL OEBETSTYLE</h1></header>

<nav>
    <a href="{{ url('/') }}">BERANDA</a>
    <a href="{{ url('/profil') }}"><b>PROFIL</b></a>
    <a href="{{ url('/kontak') }}">KONTAK</a>
    <a href="{{ url('/input') }}">FORMULIR</a>
    <a href="{{ url('/tampil') }}" style="color: #2980b9;">LIHAT DATA</a>
</nav>

<div class="content">
    <img src="{{ asset('gambar/background.jpg') }}" class="profile-img" alt="Branding">
    <h2>Elegansi dalam Kesederhanaan</h2>
    <p>Nama : Ubaidillah Muharram</p>
    <p>NIM : 1412220025</p>
    <p>Kelas : TIF 24A</p>
    
    <div class="vision-box">
        <strong>Mengenal Kami:</strong>Oebetstyle adalah brand fashion lokal yang fokus pada pakaian esensial sehari-hari dengan kualitas premium. Kami percaya bahwa pakaian bukan sekadar penutup tubuh, melainkan cara kita mengekspresikan diri tanpa kata-kata.
    </div>
</div>

</body>
</html>