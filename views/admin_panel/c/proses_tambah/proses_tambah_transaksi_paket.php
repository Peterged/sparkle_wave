<?php
$id_transaksi = $_GET['id_transaksi'];
$id_paket = $_GET['id_paket'];
$id_outlet = $_POST['qty'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

$keterangan = $_POST['keterangan'] ?? '';



$query = "INSERT INTO tb_detail_transaksi VALUES (NULL, '$id_outlet', '$jenis', '$nama_paket', '$harga')";

mysqli_query($koneksi, $query);




$queryDetailTransaksi = "INSERT INTO tb_detail_transaksi VALUES (NULL, '$id_transaksi', '$id_paket', '$qty', '$keterangan')";
$resultDetailTransaksi = mysqli_query($koneksi, $queryDetailTransaksi);

header("Location: ?page=tambah_transaksi_paket&id_transaksi=$id_transaksi");