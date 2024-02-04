<?php

$id_outlet = $_POST['id_outlet'];
$id_member = $_POST['id_member'];
$batas_waktu = $_POST['batas_waktu'];
$tgl_bayar = $_POST['tgl_bayar'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$diskon = $_POST['diskon'];
$pajak = $_POST['pajak'];
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];
$id_user = $_POST['id_user'];

$tgl = date('Y-m-d H:i:s');

// Angka random dari 10000 sampai 99999
$kode_invoice = "INV" . rand(10000, 99999);

$query = "INSERT INTO tb_transaksi VALUES (NULL, '$id_outlet', '$kode_invoice', '$id_member', '$tgl', '$batas_waktu', '$tgl_bayar', '$biaya_tambahan', '$diskon', '$pajak', '$status', '$dibayar', '$id_user')";
$result = mysqli_query($koneksi, $query);

// Kita mengambil id dari transaksi yang baru saja diinsert
$id_transaksi = mysqli_insert_id($koneksi);
$id_paket = $_POST['id_paket'];
$qty = $_POST['qty'];

$queryPaket = "SELECT harga FROM tb_paket WHERE id = '$id_paket'";
$resultPaket = mysqli_query($koneksi, $queryPaket);
$dataPaket = mysqli_fetch_assoc($resultPaket);

$harga = $dataPaket['harga'] * $qty;

$queryDetailTransaksi = "INSERT INTO tb_detail_transaksi VALUES (NULL, '$id_transaksi', '$id_paket', '$qty', '$keterangan')";
$resultDetailTransaksi = mysqli_query($koneksi, $queryDetailTransaksi);

header("Location: ?page=detail_transaksi");

// header("Location: ?page=transaksi");

// $query_nama_paket = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_paket WHERE nama_paket = '$nama_paket'");
// $cek_nama_paket = mysqli_fetch_row($query_nama_paket);


// if($cek_nama_paket[0] > 0) {
//     echo "<script>alert('Nama Paket Sudah Ada!'); window.location = '?page=tambah_paket';</script>";
// }
// else {
//     $query = "INSERT INTO tb_paket VALUES (NULL, '$id_outlet', '$jenis', '$nama_paket', '$harga')";
    
//     mysqli_query($koneksi, $query);
    
//     header("Location: ?page=paket");
// }


