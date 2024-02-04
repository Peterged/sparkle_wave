<?php

$id = @$_GET['id'];

$query = "DELETE FROM tb_transaksi WHERE id = '$id'";

mysqli_query($koneksi, $query);

header("Location: ?page=transaksi");
