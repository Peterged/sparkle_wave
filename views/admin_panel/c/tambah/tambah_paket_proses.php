<?php

include_once '../../../../config/koneksi.php';

$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

$query = "INSERT INTO tb_paket VALUES (NULL, '$id_outlet', '$jenis', '$nama_paket', '$harga')";

mysqli_query($koneksi, $query);

header("Location: ../../panel.php?page=paket");
