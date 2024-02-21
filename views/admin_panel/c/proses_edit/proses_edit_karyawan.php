<?php
$id = @$_GET['id'];

$nama = $_POST['nama'];
$username = $_POST['username'];
$role = $_POST['role'];

echo $role;

$query = "UPDATE tb_user SET nama = '$nama', username = '$username', role = '$role' WHERE id = '$id'";

mysqli_query($koneksi, $query);

header('Location: ?page=karyawan');
