<?php
$id = @$_GET['id'];

$id_outlet = $_POST['id_outlet'];
$nama_paket = $_POST['nama'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];

$query = "UPDATE tb_paket SET id_outlet = '$id_outlet', nama_paket = '$nama_paket', jenis = '$jenis', harga = '$harga' WHERE id = '$id'";

$result = mysqli_query($koneksi, $query);

header('Location: ?page=paket');
