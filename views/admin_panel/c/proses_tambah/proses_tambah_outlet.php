<?php

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

$query_nama_outlet = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_paket WHERE nama = '$nama'");
$cek_nama_outlet = mysqli_fetch_row($query_nama_outlet);

if($cek_nama_outlet[0] > 0) {
    echo "<script>alert('Nama Outlet Sudah Ada!'); window.location = '?page=outlet';</script>";
}
else {
    $query = "INSERT INTO tb_outlet VALUES (NULL, '$nama', '$alamat', '$tlp')";
    mysqli_query($koneksi, $query);
    header("Location: ?page=outlet");
}

