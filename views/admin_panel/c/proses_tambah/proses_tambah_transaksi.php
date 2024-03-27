<?php

$id_outlet = $_SESSION['id_outlet'];
$id_member = $_POST['id_member'];
$batas_waktu = $_POST['batas_waktu'];
$tgl_bayar = $_POST['tgl_bayar'];
$biaya_tambahan = 0;
$diskon = 0;
$pajak = 0.075;
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];
$id_user = $_SESSION['id_user'];
date_default_timezone_set("Asia/Makassar");

if($dibayar == 'dibayar') {
    $tgl_bayar = date('Y-m-d H:i:s');
}

$tgl = date('Y-m-d H:i:s');

// Angka random dari 10000 sampai 99999
$kode_invoice = "INV" . rand(10000, 99999);

print_r($_SESSION);

$query = "INSERT INTO tb_transaksi VALUES (NULL, '$id_outlet', '$kode_invoice', '$id_member', '$tgl', '$batas_waktu', '$tgl_bayar', '$biaya_tambahan', '$diskon', '$pajak', '$status', '$dibayar', '$id_user')";
$result = mysqli_query($koneksi, $query);


$id_transaksi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT LAST_INSERT_ID()"));
$id_transaksi = $id_transaksi[0];
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];

$queryPaket = "SELECT harga FROM tb_paket WHERE id = '$id_paket'";
$resultPaket = mysqli_query($koneksi, $queryPaket);
$dataPaket = mysqli_fetch_assoc($resultPaket);

$harga = $dataPaket['harga'] * $qty;

header("Location: ?page=tambah_transaksi_paket&id_transaksi=$id_transaksi");


