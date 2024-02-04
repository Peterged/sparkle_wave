<?php

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];
$tlp = $_POST['tlp'];

$query_nama_member = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_paket WHERE nama = '$nama'");
$cek_nama_member = mysqli_fetch_row($query_nama_member);

if($cek_nama_member[0] > 0) {
    echo "<script>alert('Nama Member Sudah Ada!'); window.location = '?page=member';</script>";
}
else {
    $query = "INSERT INTO tb_member VALUES (NULL, '$nama', '$alamat', '$kelamin', '$tlp')";
    mysqli_query($koneksi, $query);
    header("Location: ?page=member");
}
