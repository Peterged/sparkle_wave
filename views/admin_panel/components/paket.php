<?php
    $role = @$_SESSION['role'];
    if($role != 'admin') {
        $message = '<h1>ANDA BUKAN ADMIN!</h1>';
        echo "<script>document.body.innerHTML = '$message'</script>";
    }
    @include '../../../config/koneksi.php';
?>


<div class="box karyawan">
    <a href="components/tambah/tambah_paket.php">Tambah Paket</a>
    <h1 class="title">Data Paket</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Outlet</th>
            <th>Jenis</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Actions</th>
        </tr>
        <?php
            $query = "SELECT *, tb_outlet.id, tb_outlet.nama FROM tb_paket LEFT JOIN tb_outlet ON tb_paket.id_outlet = tb_outlet.id";
            $result = mysqli_query($koneksi, $query);

            while($data = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                    <td>$data[nama_paket]</td>
                    <td>$data[nama]</td>
                    <td>$data[jenis]</td>
                    <td>$data[harga]</td>
                    <td><a href='components/edit_paket.php?id=$data[id]'>EDIT</a></td>
                    <td><a href='components/delete_paket.php?id=$data[id]'>DELETE</a></td>
                    </tr>
                ";
            }

        ?>
    </table>
</div>