<?php
    $role = @$_SESSION['role'];
    if($role != 'admin') {
        $message = '<h1>ANDA BUKAN ADMIN!</h1>';
        echo "<script>document.body.innerHTML = '$message'</script>";
    }
    @include '../../../config/koneksi.php';
?>


<div class="box karyawan">
    <a href="../users/register.php">Tambah Karyawan</a>
    <h1 class="title">Data karyawan</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Outlet Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
            $query = "SELECT tb_user.nama as nama_user, tb_user.*, tb_outlet.id as outlet_id, tb_outlet.nama as outlet_nama FROM tb_user LEFT JOIN tb_outlet ON tb_user.id_outlet = tb_outlet.id";
            $result = mysqli_query($koneksi, $query);

            while($data = mysqli_fetch_assoc($result)) {
                // echo "<pre>";
                // print_r($data);
                // echo $data['nama_user'] . ' | ' . $data['outlet_nama'];
                // echo "</pre>";
                echo "
                    <tr>
                    <td>$data[nama_user]</td>
                    <td>$data[outlet_nama]</td>
                    <td>$data[username]</td>
                    <td>$data[password]</td>
                    <td>$data[role]</td>
                    <td><a href='components/edit_karyawan.php?id=$data[id]'>EDIT</a></td>
                    <td><a href='components/delete_karyawan.php?id=$data[id]'>DELETE</a></td>
                    </tr>
                ";
            }

        ?>
    </table>
</div>
