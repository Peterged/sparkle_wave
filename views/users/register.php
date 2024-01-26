<?php
    $_SESSION['role'] = 'admin';
    if(@$_SESSION['role'] !== 'admin') {

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/register.css">
    <title>Register User</title>
</head>

<body>
    <h1>Register User</h1>
    <form class="box" action="register_proses.php" method="post">
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="id_outlet">
            <option value="1">1 | Aldovanio</option>
        </select>
        <select name="role">
            <option value="owner">Owner</option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
        </select>
        <input type="submit" class="submit" name="submit" value="LOGIN">
    </form>
</body>

</html>
