<?php
include '../../db/includeKoneksi.php';
$id = @$_GET['id'];

$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);
// $username = $_POST['tlp'];

$query = "UPDATE tb_user SET password = '$password' WHERE id = '$id'";

mysqli_query($koneksi, $query);

header('Location: ../../panel.php?page=karyawan');
