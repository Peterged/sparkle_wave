<?php

include '../../../config/koneksi.php';
$id = @$_GET['id'];

$query = "DELETE FROM tb_user WHERE id = '$id'";

mysqli_query($koneksi, $query);

header('Location: ../panel.php?page=karyawan');
