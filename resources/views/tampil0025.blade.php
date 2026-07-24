<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftaran | Oebetstyle</title>
    <style>
        * { box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { margin: 0; background: #f4f4f4; color: #333; }
        header { background: #000; color: #fff; padding: 30px; text-align: center; letter-spacing: 3px; }
        nav { background: #fff; padding: 15px; text-align: center; border-bottom: 2px solid #ddd; }
        nav a { margin: 0 20px; text-decoration: none; color: #333; font-weight: bold; }
        nav a:hover { color: #d35400; }
        .wrapper { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        .table-box { background: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .title-section { font-size: 1.3rem; font-weight: bold; margin-bottom: 25px; color: #333; text-align: center; border-bottom: 2px solid #eee; padding-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 14px 15px; border-bottom: 1px solid #ddd; font-size: 14px; }
        th { background-color: #2c3e50; color: white; text-transform: uppercase; font-size: 13px; }
        
        /* Tombol Aksi Rapih */
        .btn-action { 
            display: inline-block; padding: 7px 15px; border-radius: 5px; text-decoration: none; 
            color: white; font-weight: bold; font-size: 12px; margin: 0 2px; 
            transition: 0.2s; min-width: 65px; text-align: center;
        }
        .btn-edit { background-color: #2980b9; border: 1px solid #2471a3; }
        .btn-edit:hover { background-color: #1f618d; }
        .btn-delete { background-color: #c0392b; border: 1px solid #a93226; }
        .btn-delete:hover { background-color: #922b21; }
        
        .row-link { cursor: pointer; transition: 0.2s; }
        .row-link:hover { background-color: #f9f9f9; }
        .btn-add { display: inline-block; background-color: #d35400; color: white; text-decoration: none; padding: 10px 15px; border-radius: 5px; font-weight: bold; margin-bottom: 20px; }
        .alert-db { padding: 12px; border-radius: 5px; margin-bottom: 20px; text-align: center; font-weight: bold; }
        .success { background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
    </style>
</head>
<body>

<header><h1>HALAMAN DATA PENDAFTARAN</h1></header>

<nav>
    <a href="{{ url('/') }}">BERANDA</a>
    <a href="{{ url('/profil') }}">PROFIL</a>
    <a href="{{ url('/kontak') }}">KONTAK</a>
    <a href="{{ url('/input') }}">FORMULIR</a>
    <a href="{{ url('/tampil') }}" style="color: #2980b9;"><b>LIHAT DATA</b></a>
</nav>

<div class="wrapper">
    {!! $alert_message !!}
    <div class="table-box">
        <div class="title-section">DATA PENDAFTARAN MAHASISWA BARU<br><small style="font-size: 0.9rem; color: #666; font-weight: normal;">Ubaidillah Muharram - 1412220025</small></div>
        <a href="{{ url('/input') }}" class="btn-add">+ Tambah Data Baru</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th><th>Nama Lengkap</th><th>TTL</th><th>Gender</th><th>Pilihan 1</th><th>Pilihan 2</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data_mahasiswa as $index => $row)
                    <tr class="row-link" onclick="window.location='{{ url('/detail/' . $row['id']) }}';">
                        <td>{{ $index + 1 }}</td>
                        <td><b>{{ $row['nama'] }}</b></td>
                        <td>{{ $row['tempat_lahir'] . ", " . $row['tanggal_lahir'] }}</td>
                        <td>{{ $row['jenis_kelamin'] }}</td>
                        <td>{{ $row['pilihan1'] }}</td>
                        <td>{{ $row['pilihan2'] }}</td>
                        <td onclick="event.stopPropagation();" style="text-align:center; white-space:nowrap;">
                            <a href="{{ url('/ubah/' . $row['id']) }}" class="btn-action btn-edit">Ubah</a>
                            <a href="{{ url('/hapus/' . $row['id']) }}" class="btn-action btn-delete" onclick="return confirm('Yakin hapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" style="text-align:center;">Data kosong.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>