<?php
session_start();
include_once '../../config/koneksi.php';


$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$outletId = $_POST['id_outlet'];
$role = $_POST['role'];

// Biar ga kena SQL Injection
$username = htmlspecialchars($username);
$password = htmlspecialchars($password);
$pass_hash = password_hash($password, PASSWORD_DEFAULT); // Enkripsi password

$query_username = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_user WHERE username = '$username'");
$cek_username = mysqli_fetch_row($query_username);

if ($cek_username[0] > 0) {
    echo "<script>alert('Username sudah ada!');window.location.href='register.php'</script>";
} else {
    // Kita mengambil data dari tb_users dimana
    // username dan password sama dengan yang diinputkan
    $query = "INSERT INTO tb_user (nama, username, password, id_outlet, role) VALUES ('$nama', '$username', '$pass_hash', '$outletId', '$role')";
    $hasil = mysqli_query($koneksi, $query);

    // Jika password yang diinputkan sama dengan password yang ada di database
    if(!$hasil) {
        echo "Gagal Register " . mysqli_error($koneksi);
    }
    else {
        header("Location: login.php"); 
    }
}
