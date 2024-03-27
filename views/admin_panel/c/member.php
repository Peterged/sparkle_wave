<?php
$role = @$_SESSION['role'];
if ($role == 'owner') {
    $message = '<h1>ANDA BUKAN ADMIN atau KASIR!</h1>';
    echo "<script>document.body.innerHTML = '$message'</script>";
}
?>


<div class="box karyawan">
    <a href="?page=tambah_member">Tambah Member</a>
    <h1 class="title">Data Member</h1>
    <table class="tabel-data">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telpon</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        // ! FOCUS ON THIS PART

        $query = "SELECT * from tb_member";
        $result = mysqli_query($koneksi, $query);

        while ($data = mysqli_fetch_assoc($result)) {

        ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['jenis_kelamin'] ?></td>
                <td><?= $data['tlp'] ?></td>
                <td><a href='?page=edit_member&id=<?= $data['id'] ?>'>EDIT</a></td>
                <td>
                <?php

                $id = $data['id'];
                $hide_delete = mysqli_fetch_row(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tb_member INNER JOIN tb_transaksi ON tb_member.id=tb_transaksi.id_member WHERE tb_member.id='$id'"));
                if ($hide_delete[0] == '0') {
                ?>
                    <button><a onclick="return confirm('Apakah ingin menghapus data')" href="delete/delete_member.php?id=<?= $data['id'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                    </td>
                <?php
                } else {
                    echo "-</td>";
                }
                ?>
            </tr>
            <?php
                }
            ?>







    </table>
</div>
