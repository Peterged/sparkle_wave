<?php
    @$role = $_SESSION['role'];
    if($role != 'admin') {
        $message = "<h1>ANDA BUKAN ADMIN!</h1>";
        echo "<script>document.body.innerHTML = '$message';</script>";
    }
?>

<div class="box outlet">
    <a href="tambah_outlet.php">Tambah Outlet</a>
    <h1 class="title">Data Outlet</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>alamat</th>
            <th>tlp</th>
            <th>Actions</th>
        </tr>
        <?php
            $query = "SELECT * FROM tb_outlet";
            $result = mysqli_query($koneksi, $query);
            while($data = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                    <td>$data[id]</td>
                    <td>$data[nama]</td>
                    <td>$data[alamat]</td>
                    <td>$data[tlp]</td>
                    <td><a href='components/outlet_edit.php?id=$data[id]'>EDIT</a></td>
                    <td><a href='components/outlet_delete.php?id=$data[id]'>DELETE</a></td>
                    </tr>
                ";
            }

        ?>
    </table>
</div>
