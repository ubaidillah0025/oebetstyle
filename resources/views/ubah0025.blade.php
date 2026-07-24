<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir | Oebetstyle</title>
    <style>
        * { box-sizing: border-box; font-family: 'Arial', sans-serif; }
        body { margin: 0; background: #f4f4f4; }
        header { background: #000; color: #fff; padding: 30px; text-align: center; letter-spacing: 3px; }
        nav { background: #fff; padding: 15px; text-align: center; border-bottom: 2px solid #ddd; }
        nav a { margin: 0 20px; text-decoration: none; color: #333; font-weight: bold; }
        nav a:hover { color: #d35400; }
        .form-container { max-width: 600px; margin: 50px auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .title-section { font-size: 1.3rem; font-weight: bold; margin-bottom: 25px; color: #333; text-align: center; border-bottom: 2px solid #eee; padding-bottom: 15px; }
        .sub-label { font-size: 1.05rem; font-weight: bold; margin: 30px 0 15px 0; color: #d35400; border-left: 4px solid #d35400; padding-left: 10px; text-transform: uppercase; }
        .form-group { margin-bottom: 20px; }
        .form-group-row { display: flex; gap: 15px; margin-bottom: 20px; }
        .form-group-row .form-group { flex: 1; margin-bottom: 0; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #333; }
        input[type="text"], select, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; background: #fff; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #d35400; }
        .radio-group { padding: 5px 0; font-size: 15px; }
        .radio-group label { display: inline-block; margin-right: 20px; font-weight: normal; cursor: pointer; }
        .btn-group { margin-top: 30px; display: flex; gap: 15px; }
        button { color: white; border: none; padding: 15px; border-radius: 5px; cursor: pointer; font-size: 1rem; font-weight: bold; transition: background 0.2s; }
        .btn-submit { background: #d35400; flex: 2; width: 100%; }
        .btn-submit:hover { background: #ba4a00; }
        .btn-reset { background: #7f8c8d; flex: 1; text-decoration: none; text-align: center; color: white; padding: 15px; border-radius: 5px; }
        .btn-reset:hover { background: #95a5a6; }
    </style>
</head>
<body>

<header><h1>HALAMAN EDIT DATA</h1></header>

<nav>
    <a href="{{ url('/') }}">BERANDA</a>
    <a href="{{ url('/profil') }}">PROFIL</a>
    <a href="{{ url('/kontak') }}">KONTAK</a>
    <a href="{{ url('/input') }}">FORMULIR</a>
    <a href="{{ url('/tampil') }}" style="color: #2980b9;">LIHAT DATA</a>
</nav>

<div class="form-container">
    <div class="title-section">EDIT DATA PENDAFTARAN<br><small style="font-size: 0.9rem; color: #666; font-weight: normal;">Ubaidillah Muharram - 1412220025</small></div>
    
    @if (isset($data) && $data)
        @php
            $t = explode(' ', $data['tanggal_lahir'] ?? '');
            $tipe = $data['tipe_sekolah'] ?? '';
            $nama_skolah = $data['nama_sekolah'] ?? '';
        @endphp
        <form action="{{ url('/ubah/' . $data['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $data['nama'] ?? '' }}" required>
            </div>

            <div class="form-group-row">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ $data['tempat_lahir'] ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div style="display: flex; gap: 5px;">
                        <select name="tgl" style="flex: 1;">
                            @for($i=1; $i<=31; $i++) 
                                @php $val = str_pad($i,2,'0',STR_PAD_LEFT); @endphp
                                <option value="{{ $val }}" {{ (@$t[0] == $val) ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <select name="bln" style="flex: 2;">
                            @php $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]; @endphp
                            @foreach($bulan as $b) 
                                <option value="{{ $b }}" {{ (@$t[1] == $b) ? 'selected' : '' }}>{{ $b }}</option>
                            @endforeach
                        </select>
                        <select name="thn" style="width: 85px;">
                            @for($i=2026; $i>=1990; $i--) 
                                <option value="{{ $i }}" {{ (@$t[2] == $i) ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio-group">
                    <label><input type="radio" name="jk" value="Laki-laki" {{ (($data['jenis_kelamin'] ?? '') == 'Laki-laki') ? 'checked' : '' }}> Laki-laki</label>
                    <label><input type="radio" name="jk" value="Perempuan" {{ (($data['jenis_kelamin'] ?? '') == 'Perempuan') ? 'checked' : '' }}> Perempuan</label>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ $data['alamat'] ?? '' }}">
            </div>

            <div class="form-group">
                <label>Sekolah Asal</label>
                <div class="radio-group" style="margin-bottom: 8px;">
                    <label><input type="radio" name="tipe_sekolah" value="SMA" {{ ($tipe == 'SMA') ? 'checked' : '' }}> SMA</label>
                    <label><input type="radio" name="tipe_sekolah" value="MA" {{ ($tipe == 'MA') ? 'checked' : '' }}> MA</label>
                    <label><input type="radio" name="tipe_sekolah" value="SMK" {{ ($tipe == 'SMK') ? 'checked' : '' }}> SMK</label>
                </div>
                <input type="text" name="nama_sekolah" value="{{ $nama_skolah }}">
            </div>

            <div class="sub-label">Nilai UAN</div>
            <div class="form-group-row">
                <div class="form-group"><label>Matematika</label><input type="text" name="n_mat" value="{{ $data['n_mat'] ?? '' }}"></div>
                <div class="form-group"><label>B. Inggris</label><input type="text" name="n_ing" value="{{ $data['n_ing'] ?? '' }}"></div>
                <div class="form-group"><label>B. Indonesia</label><input type="text" name="n_ind" value="{{ $data['n_ind'] ?? '' }}"></div>
            </div>

            <div class="sub-label">Jurusan Yang Dipilih</div>
            <div class="form-group-row">
                <div class="form-group">
                    <label>Pilihan 1</label>
                    <select name="pilihan1">
                        <option value="TEKNIK INFORMATIKA" {{ (($data['pilihan1'] ?? '') == 'TEKNIK INFORMATIKA') ? 'selected' : '' }}>TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK INDUSTRI" {{ (($data['pilihan1'] ?? '') == 'TEKNIK INDUSTRI') ? 'selected' : '' }}>TEKNIK INDUSTRI</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilihan 2</label>
                    <select name="pilihan2">
                        <option value="TEKNIK INFORMATIKA" {{ (($data['pilihan2'] ?? '') == 'TEKNIK INFORMATIKA') ? 'selected' : '' }}>TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK INDUSTRI" {{ (($data['pilihan2'] ?? '') == 'TEKNIK INDUSTRI') ? 'selected' : '' }}>TEKNIK INDUSTRI</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alasan Masuk UNIROW</label>
                <textarea name="alasan" rows="4">{{ $data['alasan'] ?? '' }}</textarea>
            </div>

            <div class="btn-group">
                <a href="{{ url('/tampil') }}" class="btn-reset">CANCEL</a>
                <button type="submit" class="btn-submit">SIMPAN PERUBAHAN</button>
            </div>
        </form>
    @else
        <p style="text-align:center;">Data tidak ditemukan.</p>
    @endif
</div>

</body>
</html>