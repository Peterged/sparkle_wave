<?php
$id_outlet = $_POST['id_outlet'];
$id_member = $_POST['id_member'];
$batas_waktu = $_POST['batas_waktu'];
$tgl_bayar = $_POST['tgl_bayar'];
$biaya_tambahan = $_POST['biaya_tambahan'];
$diskon = $_POST['diskon'];
$pajak = 0.0075;
$status = $_POST['status'];
$dibayar = $_POST['dibayar'];

date_default_timezone_set("Asia/Makassar");

if($dibayar == 'dibayar') {
    $tgl_bayar = date('Y-m-d H:i:s');
}

$id = @$_GET['id'];

$query = "UPDATE tb_transaksi SET id_outlet = '$id_outlet', id_member = '$id_member', batas_waktu = '$batas_waktu', tgl_bayar = '$tgl_bayar', biaya_tambahan = '$biaya_tambahan', pajak = '$pajak', status = '$status', dibayar = '$dibayar' WHERE id = '$id'";
$hasil = mysqli_query($koneksi, $query);

if($hasil){
    echo "<script>alert('Berhasil Mengubah Data!'); window.location = '?page=transaksi';</script>";
}
else {
    echo "<script>alert('Gagal Mengubah Data!'); window.location = '?page=transaksi';</script>";
}



// header('Location: ?page=transaksi');



// header("Location: ?page=transaksi");

// $query_nama_paket = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_paket WHERE nama_paket = '$nama_paket'");
// $cek_nama_paket = mysqli_fetch_row($query_nama_paket);


// if($cek_nama_paket[0] > 0) {
//     echo "<script>alert('Nama Paket Sudah Ada!'); window.location = '?page=tambah_paket';</script>";
// }
// else {
//     $query = "INSERT INTO tb_paket VALUES (NULL, '$id_outlet', '$jenis', '$nama_paket', '$harga')";

//     mysqli_query($koneksi, $query);

//     header("Location: ?page=paket");
// }


