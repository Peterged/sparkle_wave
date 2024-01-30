<?php
include '../../../config/koneksi.php';
$id = @$_GET['id'];

$nama = $_POST['nama'];
$outlet_id = $_POST[''];
$username = $_POST['tlp'];

$query = "UPDATE tb_outlet SET nama = '$nama', alamat = '$alamat', username = '$username'";

mysqli_query($koneksi, $query);

header('../panel.php?page=karyawan');
