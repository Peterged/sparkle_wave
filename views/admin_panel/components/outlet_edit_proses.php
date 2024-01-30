<?php
include '../../../config/koneksi.php';
$id = @$_GET['id'];

$nama = $_POST['nama'];
$outlet_id = $_POST['alamat'];
$tlp = $_POST['tlp'];

$query = "UPDATE tb_outlet SET nama = '$nama', alama = '$alamat', tlp = '$tlp'";

mysqli_query($koneksi, $query);

header('../panel.php?page=outlet');
