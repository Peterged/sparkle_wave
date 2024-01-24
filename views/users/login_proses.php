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
        $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $query);

        $hasil = mysqli_fetch_assoc($result);
        print_r($hasil);

        if(empty($hasil)) {
            $_SESSION['pesanError'] = 'Akun tidak ditemukan!';
            header('location: login.php');
        }
        
        // Jika akun ditemukan
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $hasil['role'];
        header('location: ../admin_panel/panel.php');
    }

