<?php
    $role = @$_SESSION['role'];
    if($role != 'admin') {
        $message = '<h1>ANDA BUKAN ADMIN!</h1>';
        echo "<script>document.body.innerHTML = '$message'</script>";
    }
?>


<div class="box karyawan">
    <a href="?page=tambah_paket">Tambah Paket</a>
    <h1 class="title">Data Paket</h1>
    <table class="tabel-data">
        <tr>
            <th>ID</th>
            <th>Nama Paket</th>
            <th>Nama Outlet</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
            $query = "SELECT tb_outlet.id AS outlet_id, tb_outlet.nama, tb_paket.* FROM tb_paket LEFT JOIN tb_outlet ON tb_paket.id_outlet = tb_outlet.id";
            $result = mysqli_query($koneksi, $query);

            while($data = mysqli_fetch_assoc($result)) {
        ?>

                    <tr>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['nama_paket'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['jenis'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><a href='?page=edit_paket&id=$data[id]'>EDIT</a></td>
                    <?php

                    $id = $data['id'];
                    $hide_delete = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_paket INNER JOIN tb_detail_transaksi ON tb_paket.id=tb_detail_transaksi.id_paket WHERE tb_paket.id='$id'"));
                    if ($hide_delete[0] == '0') {
                    ?>
                        <td><a href="?page=delete_paket&id=<?= $data['id'] ?>" onclick="return confirm('Apakah ingin menghapus data ini?')">DELETE</a></td>
                    <?php
                    } else {
                        echo "<td>-</td>";
                    }
                    ?>
                    </tr>



        <?php
            }
        ?>
    </table>
</div>
