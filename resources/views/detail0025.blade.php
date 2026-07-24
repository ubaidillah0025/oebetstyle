<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pendaftaran | Oebetstyle</title>
    <style>
        * { box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { margin: 0; background: #f4f4f4; color: #333; }
        header { background: #000; color: #fff; padding: 30px; text-align: center; letter-spacing: 3px; }
        nav { background: #fff; padding: 15px; text-align: center; border-bottom: 2px solid #ddd; }
        nav a { margin: 0 20px; text-decoration: none; color: #333; font-weight: bold; }
        nav a:hover { color: #d35400; }
        .wrapper { max-width: 700px; margin: 40px auto; padding: 0 20px; }
        .detail-box { background: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .title-section { font-size: 1.3rem; font-weight: bold; margin-bottom: 25px; color: #333; text-align: center; border-bottom: 2px solid #eee; padding-bottom: 15px; }
        
        .section-title { font-size: 1.05rem; font-weight: bold; margin: 25px 0 15px 0; color: #d35400; border-left: 4px solid #d35400; padding-left: 10px; text-transform: uppercase; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        td { padding: 12px 10px; border-bottom: 1px solid #eee; font-size: 15px; }
        td.label { font-weight: bold; color: #666; width: 35%; }
        td.value { color: #111; }
        
        .alasan-text { background: #f9f9f9; padding: 15px; border-radius: 5px; border: 1px solid #e0e0e0; font-style: italic; line-height: 1.6; }
        
        .btn-back { display: inline-block; background-color: #7f8c8d; color: white; text-decoration: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; font-size: 14px; margin-top: 20px; transition: background 0.2s; }
        .btn-back:hover { background-color: #95a5a6; }
    </style>
</head>
<body>

<header><h1>HALAMAN DETAIL DATA</h1></header>

<nav>
    <a href="{{ url('/') }}">BERANDA</a>
    <a href="{{ url('/profil') }}">PROFIL</a>
    <a href="{{ url('/kontak') }}">KONTAK</a>
    <a href="{{ url('/input') }}">FORMULIR</a>
    <a href="{{ url('/tampil') }}"><b>LIHAT DATA</b></a>
</nav>

<div class="wrapper">
    <div class="detail-box">
        <div class="title-section">BIODATA LENGKAP PENDAFTAR<br><small style="font-size: 0.9rem; color: #666; font-weight: normal;">Ubaidillah Muharram - 1412220025</small></div>
        
        <div class="section-title">Data Pribadi</div>
        <table>
            <tr>
                <td class="label">ID Pendaftaran</td>
                <td class="value">: {{ $data['id'] }}</td>
            </tr>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="value">: <b>{{ $data['nama'] }}</b></td>
            </tr>
            <tr>
                <td class="label">Tempat, Tgl Lahir</td>
                <td class="value">: {{ $data['tempat_lahir'] . ", " . $data['tanggal_lahir'] }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="value">: {{ $data['jenis_kelamin'] }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Rumah</td>
                <td class="value">: {{ $data['alamat'] }}</td>
            </tr>
            <tr>
                <td class="label">Sekolah Asal</td>
                <td class="value">: {{ $data['sekolah_asal'] }}</td>
            </tr>
        </table>

        <div class="section-title">Nilai UAN & Akademik</div>
        <table>
            <tr>
                <td class="label">Nilai Matematika</td>
                <td class="value">: {{ $data['nilai_mat'] }}</td>
            </tr>
            <tr>
                <td class="label">Nilai B. Inggris</td>
                <td class="value">: {{ $data['nilai_ing'] }}</td>
            </tr>
            <tr>
                <td class="label">Nilai B. Indonesia</td>
                <td class="value">: {{ $data['nilai_ind'] }}</td>
            </tr>
            <tr>
                <td class="label">Rata-rata Nilai</td>
                <td class="value">: <b>{{ number_format(($data['nilai_mat'] + $data['nilai_ing'] + $data['nilai_ind']) / 3, 2) }}</b></td>
            </tr>
        </table>

        <div class="section-title">Pilihan Jurusan</div>
        <table>
            <tr>
                <td class="label">Pilihan 1</td>
                <td class="value">: <span style="color: #2980b9; font-weight: bold;">{{ $data['pilihan1'] }}</span></td>
            </tr>
            <tr>
                <td class="label">Pilihan 2</td>
                <td class="value">: {{ $data['pilihan2'] }}</td>
            </tr>
        </table>

        <div class="section-title">Alasan Pendaftaran</div>
        <div class="alasan-text">
            "{!! nl2br(e($data['alasan'])) !!}"
        </div>

        <div style="text-align: center;">
            <a href="{{ url('/tampil') }}" class="btn-back">← KEMBALI KE TABEL</a>
        </div>
    </div>
</div>

</body>
</html>