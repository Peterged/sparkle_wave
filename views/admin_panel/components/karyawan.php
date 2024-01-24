<?php
    $role = @$_SESSION['role'];
    if($role != 'admin') {
        $message = '<h1>ANDA BUKAN ADMIN!</h1>';
        echo "<script>document.body.innerHTML = '$message'</script>";
    }
?>


<div class="box karyawan">
    <h1 class="title">Data karyawan</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Outlet ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php 
            $query = "SELECT * FROM tb_user";
            $result = mysqli_query($koneksi, $query);
            while($data = mysqli_fetch_assoc($result)) {
                echo "
                    <td>$data[nama]</td>
                    <td>$data[id_outlet]</td>
                    <td>$data[username]</td>
                    <td>$data[password]</td>
                    <td>$data[role]</td>
                ";
            }

            
        ?>
    </table>
</div>
