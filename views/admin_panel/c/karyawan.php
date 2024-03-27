<?php
$role = @$_SESSION['role'];
if ($role != 'admin') {
    $message = '<h1>ANDA BUKAN ADMIN!</h1>';
    echo "<script>document.body.innerHTML = '$message'</script>";
}
?>


<div class="box karyawan">
    <a href="../users/register.php">Tambah Karyawan</a>
    <h1 class="title">Data karyawan</h1>
    <table class="tabel-data">
        <tr>
            <th>Nama</th>
            <th>Nama Outlet</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        $query = "SELECT tb_user.nama as nama_user, tb_user.*, tb_outlet.id as outlet_id, tb_outlet.nama as outlet_nama FROM tb_user LEFT JOIN tb_outlet ON tb_user.id_outlet = tb_outlet.id";
        $result = mysqli_query($koneksi, $query);

        while ($data = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
            <td>$data[nama_user]</td>
            <td>$data[outlet_nama]</td>
            <td>$data[username]</td>
            <td><a href='?page=edit_password_karyawan&id=$data[id]'>EDIT PASSWORD</a></td>
            <td>$data[role]</td>
            <td><a href='?page=edit_karyawan&id=$data[id]'>EDIT</a></td>
            ";

            if ($data['nama_user'] == $_SESSION['username']) {
                echo "<td>Ini akun yang anda sedang gunakan</td>";
                continue;
            } else {

                $id = $data['id'];
                $hide_delete = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_user INNER JOIN tb_transaksi ON tb_user.id=tb_transaksi.id_user WHERE tb_user.id='$id'"));

                if ($_SESSION['username'] != $data['username'] && $hide_delete[0] == '0') {

            ?>
                <td>
                    <a href="?page=delete_karyawan&id=<?= $data['id'] ?>" onclick="return confirm('Apakah ingin menghapus data ini?')">DELETE</a>
                </td>
            <?php
                  }
                }
            }
            ?>



    </table>
</div>
