<?php
    session_start();
    if(@$_SESSION['username']) {
        header('Location: ../views/admin_panel/panel.php');
        exit;
    }
    $pesanError = '';

    // jika pesan error ada dalam session
    // maka kita ambil, memasukkan ke variabel $pesanError
    // dan menghapus session pesanError
    // jika tidak ada, maka $pesanError kosong
    if(isset($_SESSION['pesanError'])) {
        $pesanError = $_SESSION['pesanError'];
        unset($_SESSION['pesanError']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/login.css">
    <title>Login</title>
</head>

<body>
    <h1>Logins</h1>
    <form class="box" action="login_proses.php" method="post">
        <input type="text" name="username" placeholder="Username" autocomplete="off" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" class="submit" name="submit" value="LOGIN">
        <p class="pesanError"><?= $pesanError ?></p>
    </form>
</body>
</html>
