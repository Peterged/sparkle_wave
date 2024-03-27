<?php
$id_transaksi = $_GET['id_transaksi'];
$id_detail_transaksi = $_GET['id_detail_transaksi'];

$query = "DELETE FROM tb_detail_transaksi WHERE id='$id_detail_transaksi'";
mysqli_query($koneksi, $query);

header("Location: panel.php?page=detail_transaksi&id=$id_transaksi");

