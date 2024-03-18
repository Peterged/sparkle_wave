<?php 
    $id_transaksi = $_GET['id_transaksi'];
?>

<div class="form-container">
    <h1 class="title">Tambah Paket</h1>
    <h2>
        <?php 
            $id = @$_GET['id'];
            $query = "SELECT * FROM tb_transaksi WHERE id = '$id_transaksi'";
            $result = mysqli_query($koneksi, $query);
            $data = mysqli_fetch_assoc($result);

            $queryMember = "SELECT * FROM tb_member WHERE id = '$data[id_member]'";
            $resultMember = mysqli_query($koneksi, $queryMember);
            $dataMember = mysqli_fetch_assoc($resultMember);
            echo "<h2>$data[kode_invoice] - $dataMember[nama]</h2>";
        ?>
    </h2>
    <?php
                $idOutlet = $_SESSION['id_outlet'];
                $query = "SELECT id, nama FROM tb_outlet WHERE id = '$idOutlet'";
                $result = mysqli_query($koneksi, $query);
                $data = mysqli_fetch_assoc($result);
                    
                    echo "<h3>$data[nama]</h3>";
                
                ?>

    <form class="box-form" action="?page=proses_tambah_transaksi_paket&id_transaksi=<?= $id_transaksi ?>" method="post">
        
        
        
        
        
        <select name="id_member" id="" required>
            <option value="" disabled selected> -- Pilih Paket -- </option>
            <?php
                $idOutlet = $_SESSION['id_outlet'];
                $query = "SELECT id, nama_paket FROM tb_paket WHERE id_outlet = '$idOutlet'";
                $result = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$data[id]'>$data[id] | $data[nama_paket]</option>
                    ";
                }
            ?>
        </select>
        
        <input type="number" name="qty" placeholder="Qty" required>
        <textarea name="keterangan" id="" cols="30" rows="10" placeholder="Keterangan"></textarea>
        <input type="submit" class="submit" name="submit" value="TAMBAH PAKET">
    </form>
    
</div>
