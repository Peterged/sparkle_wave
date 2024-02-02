<div class="sidebar">
    <?php

    $role = $_SESSION['role'];
    $username = $_SESSION['username'];

    echo "
        <p class='profile-name'>$username <span>$role</span></p>
    ";

    if ($role === 'admin') {
        echo "
                <a href='?page=dashboard'>Dashboard</a>
                <a href='?page=karyawan'>Karyawan</a>
                <a href='?page=outlet'>Outlet</a>
                <a href='?page=paket'>Paket</a>
                <a href='?page=member'>Member</a>
                <a href='?page=transaksi'>Transaksi</a>
                <a href='?page=laporan'>Laporan</a>
            ";
    } elseif ($role === 'kasir') {
        echo "
                <a href='?page=dashboard'>Dashboard</a>
                <a href='?page=transaksi'>Transaksi</a>
                <a href='?page=member'>Member</a>
                <a href='?page=laporan'>Laporan</a>
            ";
    } elseif ($role === 'owner') {
        echo "
            <a href='?page=laporan'>Laporan</a>
            ";
    }

    ?>
    <a class="logout-btn" href="../commands/logout.php">Logout</a>
</div>