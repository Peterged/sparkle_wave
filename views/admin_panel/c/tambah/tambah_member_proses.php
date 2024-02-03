<?php
include "../../../../config/koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];
$tlp = $_POST['tlp'];

$query = "INSERT INTO tb_member VALUES (NULL, '$nama', '$alamat', '$kelamin', '$tlp')";

mysqli_query($koneksi, $query);

header("Location: ../../panel.php?page=member");
