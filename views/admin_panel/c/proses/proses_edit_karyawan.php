<?php
include '../../db/includeKoneksi.php';
$id = @$_GET['id'];

$nama = $_POST['nama'];
$username = $_POST['username'];
$role = $_POST['role'];

$query = "UPDATE tb_user SET nama = '$nama', username = '$username', role = '$role' WHERE id = '$id'";

mysqli_query($koneksi, $query);

header('Location: ../../panel.php?page=karyawan');
