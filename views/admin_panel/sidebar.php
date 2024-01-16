<head>
    <link rel="stylesheet" href="css/sidebar.css">
</head>

<div class="sidebar">
    <p class="profile-name">Aldovanio - Admin</p>
    <?php 
        $role = @$_SESSION['role'];

        $links = [
            'admin' => [
                ['Dashboard', 'index.php?page='],
                ['Karyawan', ''],
                ['Outlet', ''],
                ['Package', ''],
                ['Pelanggan', ''],
                ['Transaksi', ''],
                ['Report', '']
            ],
            'kasir' => [
                ['Dashboard', ''],
                ['Transaksi', ''],
                ['Report', '']
            ],
            'owner' => [
                ['Report', '']
            ]
        ];
    ?>

    <?php if(isset($links[$role])) : ?>
        <?php foreach($links[$role] as $link) : ?>
            <a href="<?php echo $link[1]; ?>"><?php echo $link[0]; ?></a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
