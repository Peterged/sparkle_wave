<?php
include '../../../config/koneksi.php';
$id = @$_GET['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

$query = "UPDATE tb_outlet SET nama = '$nama', alamat = '$alamat', tlp = '$tlp' WHERE id = '$id'";

mysqli_query($koneksi, $query);

header('Location: ../panel.php?page=outlet');
