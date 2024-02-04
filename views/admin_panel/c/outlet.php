<?php
@$role = $_SESSION['role'];
if ($role != 'admin') {
    $message = "<h1>ANDA BUKAN ADMIN!</h1>";
    echo "<script>document.body.innerHTML = '$message';</script>";
}
?>

<div class="box outlet">
    <a href="tambah_outlet.php">Tambah Outlet</a>
    <h1 class="title">Data Outlet</h1>
    <table class="tabel-data">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>alamat</th>
            <th>tlp</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        // $query = "SELECT *, tb_user.id FROM tb_outlet FULL JOIN tb_user ON tb_outlet.id = tb_user.id_outlet WHERE tb_user.role = 'admin'";
        $query = "SELECT tb_outlet.*, tb_user.id AS user_id FROM tb_outlet LEFT JOIN tb_user ON tb_outlet.id = tb_user.id_outlet
        UNION
        SELECT tb_outlet.*, tb_user.id AS user_id FROM tb_outlet RIGHT JOIN tb_user ON tb_outlet.id = tb_user.id_outlet";

        $query = "SELECT tb_outlet.*, 
        (SELECT COUNT(*) FROM (
            SELECT id_outlet FROM tb_user
            UNION ALL
            SELECT id_outlet FROM tb_transaksi
        ) as tb WHERE tb.id_outlet = tb_outlet.id) as is_used
        FROM tb_outlet";


        $result = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            echo "
                    <tr>
                    <td>$data[id]</td>   
                    <td>$data[nama]</td>
                    <td>$data[alamat]</td>
                    <td>$data[tlp]</td>
                    <td><a href='c/outlet_edit.php?id=$data[id]'>EDIT</a></td>
                ";

            if (!$data['is_used']) {
                echo "<td><a href='c/delete/outlet_delete.php?id=$data[id]'>DELETE</a></td>";
            } else {
                echo "<td>-</td>";
                // echo "<td></td>";
            }
            echo "</tr>";
        }

        ?>
    </table>
</div>