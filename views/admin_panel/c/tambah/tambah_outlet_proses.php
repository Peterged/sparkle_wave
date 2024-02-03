<?php

include "../../../../config/koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

$query = "INSERT INTO tb_outlet VALUES (NULL, '$nama', '$alamat', '$tlp')";

mysqli_query($koneksi, $query);

header("Location: ../../panel.php?page=outlet");
