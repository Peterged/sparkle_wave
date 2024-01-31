<?php
    session_start();
    include_once '../../config/koneksi.php';

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        // Kita mengambil data dari tb_users dimana
        // username dan password sama dengan yang diinputkan

        $query = "SELECT * FROM tb_user WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);

        $dataUser = mysqli_fetch_assoc($result);

        if(empty($dataUser)) {
            $_SESSION['pesanError'] = 'Akun tidak ditemukan!';
            header('location: login.php');
        }

        // Jika password yang diinputkan sama dengan password yang ada di database

        if(password_verify($password, $dataUser['password'])) {
            $_SESSION['username'] = $dataUser['username'];
            $_SESSION['role'] = $dataUser['role'];
            header('location: ../admin_panel/panel.php');
        } else {
            $_SESSION['pesanError'] = 'Username atau Password Salah!';
            header('location: login.php');
        }
    }

