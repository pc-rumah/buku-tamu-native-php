<?php
// Include file koneksi
include 'koneksi.php';

// Ambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO kontak (nama, nomor_telepon, alamat) VALUES ('$nama', '$nomor_telepon', '$alamat')";

    if ($koneksi->query($sql) === TRUE) {
        echo "berhasil"; // Pesan sukses
    } else {
        echo "gagal"; // Pesan gagal
    }

    // Tutup koneksi
    $koneksi->close();
}
