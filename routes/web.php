<?php

use Illuminate\Support\Facades\Route;

// Halaman Beranda
Route::get('/', function () {
    return view('beranda');
});

// Halaman Profil
Route::get('/profil', function () {
    return view('profil');
});

// Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak');
});

// Halaman Formulir Input Data
Route::get('/input', function () {
    return view('input0025');
});

// Proses Simpan Data dari Formulir
Route::post('/input', function () {
    $inputData = request()->all();
    
    // Ambil data session saat ini atau buat array baru
    $data_mahasiswa = session('data_mahasiswa', []);
    
    // Tentukan ID baru (increment sederhana)
    $newId = count($data_mahasiswa) + 1;

    $dataBaru = [
        'id' => $newId,
        'nama' => $inputData['nama'] ?? '-',
        'tempat_lahir' => $inputData['tempat_lahir'] ?? '-',
        'tanggal_lahir' => ($inputData['tgl'] ?? '') . ' ' . ($inputData['bln'] ?? '') . ' ' . ($inputData['thn'] ?? ''),
        'jenis_kelamin' => $inputData['jk'] ?? '-',
        'alamat' => $inputData['alamat'] ?? '-',
        'tipe_sekolah' => $inputData['tipe_sekolah'] ?? '-',
        'nama_sekolah' => $inputData['nama_sekolah'] ?? '-',
        'n_mat' => $inputData['n_mat'] ?? '-',
        'n_ing' => $inputData['n_ing'] ?? '-',
        'n_ind' => $inputData['n_ind'] ?? '-',
        'pilihan1' => $inputData['pilihan1'] ?? '-',
        'pilihan2' => $inputData['pilihan2'] ?? '-',
        'alasan' => $inputData['alasan'] ?? '-',
    ];

    // Masukkan data baru ke dalam session
    session()->push('data_mahasiswa', $dataBaru);

    return redirect('/tampil');
});

// Halaman Lihat Data (/tampil)
Route::get('/tampil', function () {
    $data_mahasiswa = session('data_mahasiswa', []);
    $alert_message = '<div class="alert-db success">Data berhasil dimuat!</div>';
    
    return view('tampil0025', compact('data_mahasiswa', 'alert_message'));
});

Route::get('/detail/{id}', function ($id) {
    $data_mahasiswa = session('data_mahasiswa', []);
    $data = null; // Ganti $detail menjadi $data

    foreach ($data_mahasiswa as $item) {
        if ($item['id'] == $id) {
            $data = $item;
            break;
        }
    }

    if (!$data) {
        return redirect('/tampil');
    }

    return view('detail0025', compact('data')); // Kirim sebagai 'data'
});

// 2. Tombol Hapus (Menghapus Data berdasarkan ID)
Route::get('/hapus/{id}', function ($id) {
    $data_mahasiswa = session('data_mahasiswa', []);
    
    // Filter data untuk membuang ID yang dipilih
    $data_baru = array_filter($data_mahasiswa, function ($item) use ($id) {
        return $item['id'] != $id;
    });

    // Simpan ulang array yang sudah dibersihkan ke session
    session(['data_mahasiswa' => array_values($data_baru)]);

    return redirect('/tampil');
});

Route::get('/ubah/{id}', function ($id) {
    $data_mahasiswa = session('data_mahasiswa', []);
    $data = null;

    foreach ($data_mahasiswa as $item) {
        if (isset($item['id']) && $item['id'] == $id) {
            $data = $item;
            break;
        }
    }

    if (!$data) {
        return redirect('/tampil')->with('error', 'Data tidak ditemukan.');
    }

    return view('ubah0025', compact('data'));
});

Route::put('/ubah/{id}', function (\Illuminate\Http\Request $request, $id) {
    $data_mahasiswa = session('data_mahasiswa', []);

    foreach ($data_mahasiswa as $index => $item) {
        if (isset($item['id']) && $item['id'] == $id) {
            $data_mahasiswa[$index] = [
                'id' => $id,
                'nama' => $request->input('nama', $item['nama']),
                'tempat_lahir' => $request->input('tempat_lahir', $item['tempat_lahir']),
                'tanggal_lahir' => trim(($request->input('tgl') ?? '') . ' ' . ($request->input('bln') ?? '') . ' ' . ($request->input('thn') ?? '')),
                'jenis_kelamin' => $request->input('jk', $item['jenis_kelamin']),
                'alamat' => $request->input('alamat', $item['alamat']),
                'tipe_sekolah' => $request->input('tipe_sekolah', $item['tipe_sekolah'] ?? ''),
                'nama_sekolah' => $request->input('nama_sekolah', $item['nama_sekolah'] ?? ''),
                'n_mat' => $request->input('n_mat', $item['n_mat'] ?? ''),
                'n_ing' => $request->input('n_ing', $item['n_ing'] ?? ''),
                'n_ind' => $request->input('n_ind', $item['n_ind'] ?? ''),
                'pilihan1' => $request->input('pilihan1', $item['pilihan1']),
                'pilihan2' => $request->input('pilihan2', $item['pilihan2']),
                'alasan' => $request->input('alasan', $item['alasan']),
            ];
            break;
        }
    }

    session(['data_mahasiswa' => $data_mahasiswa]);

    return redirect('/tampil');
});