<?php
    session_start();
    include_once '../../config/koneksi.php';

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Biar ga kena SQL Injection
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        // Kita mengambil data dari tb_users dimana
        // username dan password sama dengan yang diinputkan
        $query = "SELECT * FROM tb_user WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);
        $dataUser = mysqli_fetch_assoc($result);

        if(password_verify($password, $dataUser['password'])) {
            $_SESSION['username'] = $dataUser['username'];
            $_SESSION['role'] = $dataUser['role'];
            $_SESSION['id_user'] = $dataUser['id'];
            $_SESSION['id_outlet'] = $dataUser['id_outlet'];
            header('location: ../admin_panel/panel.php');
        } else {
            echo "<script>alert('Username atau Password Salah!');window.location.href='login.php'</script>";
            // header('location: login.php');
        }


    }

