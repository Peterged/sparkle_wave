<?php
    session_start();
    if(!@$_SESSION['username']) {
        session_destroy();
        header("Location: ../../index.php");
    }
    include "../../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="../../css/panel.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- Kita ambil sidebarnya -->
    <?php
        include_once 'sidebar.php';
    ?>

    <!-- Ini buat tempat komponen -->
    <div class="container">
        <?php
            include_once 'panelContent.php';
        ?>
    </div>
</body>

</html>
