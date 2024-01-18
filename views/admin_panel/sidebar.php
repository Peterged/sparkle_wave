<head>
    <link rel="stylesheet" href="../../css/sidebar.css">
</head>

<div class="sidebar">
    <p class="profile-name">Aldovanio - Admin</p>
    <?php

    $role = @$_SESSION['role'];

    if ($role === 'admin') {
        echo "
                <a href='?panelSection=dashboard'>Dashboard</a>
                <a href='?panelSection=karyawan'>Karyawan</a>
                <a href='?panelSection=outlet'>Outlet</a>
                <a href='?panelSection=package'>Package</a>
                <a href='?panelSection=pelanggan'>Pelanggan</a>
                <a href='?panelSection=transaksi'>Transaksi</a>
                <a href='?panelSection=report'>Report</a>
            ";
    } elseif ($role === 'kasir') {
        echo "
                <a href='?panelSection=dashboard'>Dashboard</a>
                <a href='?panelSection=transaksi'>Transaksi</a>
                <a href='?panelSection=pelanggan'>Pelanggan</a>
                <a href='?panelSection=report'>Report</a>
            ";
    } elseif ($role === 'owner') {
        echo "
            <a href='?panelSection=report'>Report</a>
            ";
    }

    ?>
</div>
