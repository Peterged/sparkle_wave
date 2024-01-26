<?php
    session_start();
    include_once '../../config/koneksi.php';

    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $outletId = $_POST['id_outlet'];
        $role = $_POST['role'];


        $nama = htmlspecialchars($nama);
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $outletId = htmlspecialchars($outletId);
        $role = htmlspecialchars($role);

        $password = password_hash($password, PASSWORD_DEFAULT);

        // Kita mengambil data dari tb_users dimana
        // username dan password sama dengan yang diinputkan
        $query = "INSERT INTO tb_user (nama, username, password, id_outlet, role) VALUES ('$nama', '$username', '$password', '$outletId', '$role')";
        $result = mysqli_query($koneksi, $query);

        // Jika password yang diinputkan sama dengan password yang ada di database
        $_SESSION['pesanError'] = 'Akun berhasil dibuat!';
        header('location: login.php');
    }

