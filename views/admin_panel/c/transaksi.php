<?php
    $role = @$_SESSION['role'];
    if($role == 'owner') {
        $message = '<h1>ANDA BUKAN ADMIN atau KASIR!</h1>';
        echo "<script>document.body.innerHTML = '$message'</script>";
    }
?>


<div class="box karyawan">
    <a href="?page=tambah_transaksi">Tambah Transaksi</a>
    <h1 class="title">Data Transaksi</h1>
    <table class="tabel-data">
        <tr>
            <th>ID</th>
            <th>Kode Invoice</th>
            <th>ID User</th>
            <th>ID Outlet</th>
            <th>Tgl</th>
            <th>Batas Waktu</th>
            <th>Status</th>
            <th>Dibayar</th>
            <th colspan="3">Actions</th>
        </tr>
        <?php
            $query = "SELECT * from tb_transaksi";
            $result = mysqli_query($koneksi, $query);

            while($data = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                    <td>$data[id]</td>
                    <td>$data[kode_invoice]</td>
                    <td>$data[id_user]</td>
                    <td>$data[id_outlet]</td>
                    <td>$data[tgl]</td>
                    <td>$data[batas_waktu]</td>
                    <td>$data[status]</td>
                    <td>$data[dibayar]</td>
                    <td><a href='?page=edit_transaksi&id=$data[id]'>EDIT</a></td>  
                    ";
                    
                    // <td>$data[tgl_bayar]</td>
                                    // <td>$data[biaya_tambahan]</td>
                    // <td>$data[diskon]</td>
                    // <td>$data[pajak]</td>

                
                echo "<td><a href='?page=delete_transaksi&id=$data[id]'>DELETE</a></td>";

                if($role == 'admin' || $role == 'kasir') {
                    echo "<td><a href='?page=detail_transaksi&id=$data[id]'>DETAIL</a></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</div>
