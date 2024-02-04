<?php
    $role = @$_SESSION['role'];
    if($role == 'owner') {
        $message = '<h1>ANDA BUKAN ADMIN atau KASIR!</h1>';
        echo "<script>document.body.innerHTML = '$message'</script>";
    }
?>


<div class="box karyawan">
    <a href="c/tambah/tambah_member.php">Tambah Member</a>
    <h1 class="title">Data Member</h1>
    <table class="tabel-data">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telpon</th>
            <th>Actions</th>
        </tr>
        <?php
        // ! FOCUS ON THIS PART

            $query = "SELECT * from tb_member";
            $result = mysqli_query($koneksi, $query);

            while($data = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                    <td>$data[id]</td>
                    <td>$data[nama]</td>
                    <td>$data[alamat]</td>
                    <td>$data[jenis_kelamin]</td>
                    <td>$data[tlp]</td>
                    <td><a href='?page=edit_member&id=$data[id]'>EDIT</a></td>  
                ";


                $temp = "<td><a href='?page=delete_member&id=$data[id]'>DELETE</a></td>
                </tr>";
            }
        ?>
    </table>
</div>
