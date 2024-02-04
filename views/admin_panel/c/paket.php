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
                echo "
                    <tr>
                    <td>$data[id]</td>
                    <td>$data[nama_paket]</td>
                    <td>$data[nama]</td>
                    <td>$data[jenis]</td>
                    <td>$data[harga]</td>
                    <td><a href='?page=edit_paket&id=$data[id]'>EDIT</a></td>
                    <td><a href='?page=delete_paket&id=$data[id]'>DELETE</a></td>
                    </tr>
                ";
            }

        ?>
    </table>
</div>
