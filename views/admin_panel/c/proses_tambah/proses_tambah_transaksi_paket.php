<?php
ini_set('display_errors', 0);
$id_transaksi = $_GET['id_transaksi'];
$id_paket = $_POST['id_paket'];

// ?? itu apa?
// $_POST['qty'] ?? ''
// Jika $_POST['qty'], maka
$id_outlet = $_POST['qty'] ?? 1;
$keterangan = $_POST['keterangan'] ?? '';

$queryPaket = "SELECT * FROM tb_paket WHERE id = '$id_paket'";
$dataPaket = mysqli_query($koneksi, $queryPaket);
$dataPaket = mysqli_fetch_assoc($dataPaket);

$jenis = $dataPaket['jenis'];
$nama_paket = $dataPaket['nama_paket'];
$harga = $dataPaket['harga'];

$query = "INSERT INTO tb_detail_transaksi VALUES (id, '$id_outlet', '$jenis', '$nama_paket', '$harga')";
mysqli_query($koneksi, $query);

header("Location: ?page=tambah_transaksi_paket&id_transaksi=$id_transaksi");
