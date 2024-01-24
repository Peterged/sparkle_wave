<head>
    <link rel="stylesheet" href="../../css/sidebar.css">
</head>

<div class="sidebar">
    <?php

    $role = $_SESSION['role'];
    $username = $_SESSION['username'];

    echo "
        <p class='profile-name'>$username - $role</p> 
    ";

    if ($role === 'admin') {
        echo "
                <a href='?page=dashboard'>Dashboard</a>
                <a href='?page=karyawan'>Karyawan</a>
                <a href='?page=outlet'>Outlet</a>
                <a href='?page=package'>Package</a>
                <a href='?page=pelanggan'>Pelanggan</a>
                <a href='?page=transaksi'>Transaksi</a>
                <a href='?page=report'>Report</a>
            ";
    } elseif ($role === 'kasir') {
        echo "
                <a href='?page=dashboard'>Dashboard</a>
                <a href='?page=transaksi'>Transaksi</a>
                <a href='?page=pelanggan'>Pelanggan</a>
                <a href='?page=report'>Report</a>
            ";
    } elseif ($role === 'owner') {
        echo "
            <a href='?page=report'>Report</a>
            ";
    }

    ?>
    <a class="logout-btn" href="../commands/logout.php">Logout</a>
</div>
