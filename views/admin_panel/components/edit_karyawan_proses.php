<?php
include '../../../config/koneksi.php';
$id = @$_GET['id'];

$nama = $_POST['nama'];
$username = $_POST['username'];
// $username = $_POST['tlp'];

$query = "UPDATE tb_user SET nama = '$nama', username = '$username' WHERE id = '$id'";

mysqli_query($koneksi, $query);

header('Location: ../panel.php?page=karyawan');
