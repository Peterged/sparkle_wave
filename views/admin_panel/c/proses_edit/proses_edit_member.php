<?php
$id = @$_GET['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];
// $username = $_POST['tlp'];

$query = "UPDATE tb_member SET nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', tlp = '$tlp' WHERE id = '$id'";

mysqli_query($koneksi, $query);

header('Location: ?page=member');
