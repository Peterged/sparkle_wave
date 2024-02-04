<?php

$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

$query_nama_paket = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_paket WHERE nama_paket = '$nama_paket'");
$cek_nama_paket = mysqli_fetch_row($query_nama_paket);


if($cek_nama_paket[0] > 0) {
    echo "<script>alert('Nama Paket Sudah Ada!'); window.location = '?page=tambah_paket';</script>";
}
else {
    $query = "INSERT INTO tb_paket VALUES (NULL, '$id_outlet', '$jenis', '$nama_paket', '$harga')";
    
    mysqli_query($koneksi, $query);
    
    header("Location: ?page=paket");
}


