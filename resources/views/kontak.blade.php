<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak | Oebetstyle</title>
    <style>
        * { box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { margin: 0; background: #f4f4f4; }
        header { background: #000; color: #fff; padding: 30px; text-align: center; letter-spacing: 3px; }
        nav { background: #fff; padding: 15px; text-align: center; border-bottom: 2px solid #ddd; }
        nav a { margin: 0 20px; text-decoration: none; color: #333; font-weight: bold; }
        .contact-container { max-width: 600px; margin: 50px auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; }
        button { background: #d35400; color: white; border: none; padding: 15px; width: 100%; border-radius: 5px; cursor: pointer; font-size: 1rem; font-weight: bold; }
        button:hover { background: #ba4a00; }
        .contact-info { margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px; text-align: center; line-height: 1.6; }
    </style>
</head>
<body>

<header><h1>HUBUNGI OEBETSTYLE</h1></header>

<nav>
    <a href="{{ url('/') }}">BERANDA</a>
    <a href="{{ url('/profil') }}">PROFIL</a>
    <a href="{{ url('/kontak') }}"><b>KONTAK</b></a>
    <a href="{{ url('/input') }}">FORMULIR</a>
    <a href="{{ url('/tampil') }}" style="color: #2980b9;">LIHAT DATA</a>
</nav>

<div class="contact-container">
    <form action="{{ url('/kontak') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan nama..." required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email aktif..." required>
        </div>
        <div class="form-group">
            <label>Pesan</label>
            <textarea name="pesan" rows="4" placeholder="Apa yang bisa kami bantu?" required></textarea>
        </div>
        <button type="submit">KIRIM PESAN</button>
    </form>

    <div class="contact-info">
        <p><strong>Alamat:</strong> Labuhan, Brondong, lamongan</p>
        <p><strong>WhatsApp:</strong> 0857-0837-4727</p>
        <p><strong>Email:</strong> oebet2002@gmail.com</p>
    </div>
</div>

</body>
</html>