<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use PDOException;

class PendaftaranController extends Controller
{
    private function getKoneksi()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "mysql";

        try {
            $koneksi = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $koneksi;
        } catch (PDOException $e) {
            die("Koneksi Database Gagal: " . $e->getMessage());
        }
    }

    // 1. Tampil Data (tampil0025)
    public function index(Request $request)
    {
        $koneksi = $this->getKoneksi();
        $alert_message = "";
        $data_mahasiswa = [];

        if ($request->has('status')) {
            if ($request->get('status') == 'sukses') {
                $alert_message = "<div class='alert-db success'>✓ Sukses! Data berhasil diperbarui.</div>";
            } elseif ($request->get('status') == 'sukses_tambah') {
                $alert_message = "<div class='alert-db success'>✓ Sukses! Data pendaftaran baru berhasil ditambahkan.</div>";
            } elseif ($request->get('status') == 'sukses_hapus') {
                $alert_message = "<div class='alert-db success'>✓ Sukses! Data telah berhasil dihapus.</div>";
            }
        }

        $stmt = $koneksi->prepare("SELECT * FROM tabel_pendaftaran ORDER BY id DESC");
        $stmt->execute();
        $data_mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return view('tampil0025', compact('alert_message', 'data_mahasiswa'));
    }

    // 2. Simpan Data (proses0025)
    public function store(Request $request)
    {
        $koneksi = $this->getKoneksi();

        $tgl_lahir = $request->input('tgl') . "/" . $request->input('bln') . "/" . $request->input('thn');
        $sekolah = $request->input('tipe_sekolah') . " " . $request->input('nama_sekolah');

        $sql = "INSERT INTO tabel_pendaftaran (nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, sekolah_asal, nilai_mat, nilai_ing, nilai_ind, pilihan1, pilihan2, alasan) 
                VALUES (:nama, :tempat, :tgl, :jk, :alamat, :sekolah, :n_mat, :n_ing, :n_ind, :p1, :p2, :alasan)";
        
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([
            ':nama'   => $request->input('nama'),
            ':tempat' => $request->input('tempat_lahir'),
            ':tgl'    => $tgl_lahir,
            ':jk'     => $request->input('jk'),
            ':alamat' => $request->input('alamat'),
            ':sekolah'=> $sekolah,
            ':n_mat'  => $request->input('n_mat'),
            ':n_ing'  => $request->input('n_ing'),
            ':n_ind'  => $request->input('n_ind'),
            ':p1'     => $request->input('pilihan1'),
            ':p2'     => $request->input('pilihan2'),
            ':alasan' => $request->input('alasan')
        ]);

        return redirect('/tampil?status=sukses_tambah');
    }

    // 3. Detail Data (detail0025)
    public function show($id)
    {
        $koneksi = $this->getKoneksi();
        $stmt = $koneksi->prepare("SELECT * FROM tabel_pendaftaran WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = strtoupper(date('d F Y'));

        return view('detail0025', compact('data', 'tanggal_sekarang'));
    }

    // 4. Form Edit Data (ubah0025)
    public function edit($id)
    {
        $koneksi = $this->getKoneksi();
        $stmt = $koneksi->prepare("SELECT * FROM tabel_pendaftaran WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return view('ubah0025', compact('data'));
    }

    // 5. Update Data (ubah0025 - Proses)
    public function update(Request $request, $id)
    {
        $koneksi = $this->getKoneksi();
        $tgl_lahir = $request->input('tgl') . "/" . $request->input('bln') . "/" . $request->input('thn');
        $sekolah = $request->input('tipe_sekolah') . " " . $request->input('nama_sekolah');
        
        $sql = "UPDATE tabel_pendaftaran SET 
                nama=:nama, tempat_lahir=:tempat, tanggal_lahir=:tgl, jenis_kelamin=:jk, 
                alamat=:alamat, sekolah_asal=:sekolah, nilai_mat=:n_mat, nilai_ing=:n_ing, 
                nilai_ind=:n_ind, pilihan1=:p1, pilihan2=:p2, alasan=:alasan 
                WHERE id=:id";
        
        $stmt = $koneksi->prepare($sql);
        $stmt->execute([
            ':nama'   => $request->input('nama'), 
            ':tempat' => $request->input('tempat_lahir'), 
            ':tgl'    => $tgl_lahir,
            ':jk'     => $request->input('jk'), 
            ':alamat' => $request->input('alamat'), 
            ':sekolah'=> $sekolah,
            ':n_mat'  => $request->input('n_mat'), 
            ':n_ing'  => $request->input('n_ing'), 
            ':n_ind'  => $request->input('n_ind'),
            ':p1'     => $request->input('pilihan1'), 
            ':p2'     => $request->input('pilihan2'), 
            ':alasan' => $request->input('alasan'), 
            ':id'     => $id
        ]);
        
        return redirect('/tampil?status=sukses');
    }

    // 6. Hapus Data (hapus0025)
    public function destroy($id)
    {
        $koneksi = $this->getKoneksi();
        $stmt = $koneksi->prepare("DELETE FROM tabel_pendaftaran WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return redirect('/tampil?status=sukses_hapus');
    }
}