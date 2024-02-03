<?php
    $role = @$_SESSION['role'];
    if($role != 'admin') {
        $message = '<h1>ANDA BUKAN ADMIN!</h1>';
        echo "<script>document.body.innerHTML = '$message'</script>";
    }
?>


<div class="box karyawan">
    <a href="c/tambah/tambah_member.php">Tambah Member</a>
    <h1 class="title">Data Member</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telpon</th>
            <th>Actions</th>
        </tr>
        <?php
            $query = "SELECT * from tb_member";
            $result = mysqli_query($koneksi, $query);

            while($data = mysqli_fetch_assoc($result)) {
                // echo "<pre>";
                // print_r($data);
                // echo $data['nama_user'] . ' | ' . $data['outlet_nama'];
                // echo "</pre>";
                echo "
                    <tr>
                    <td>$data[id]</td>
                    <td>$data[nama]</td>
                    <td>$data[alamat]</td>
                    <td>$data[jenis_kelamin]</td>
                    <td>$data[tlp]</td>
                    <td><a href='c/edit_member.php?id=$data[id]'>EDIT</a></td>
                    <td><a href='c/delete_member.php.php?id=$data[id]'>DELETE</a></td>
                    </tr>
                ";
            }

        ?>
    </table>
</div>
