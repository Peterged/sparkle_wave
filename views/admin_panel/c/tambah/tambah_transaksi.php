<?php

?>

<div class="form-container">
    <h1 class="title">Tambah Transaksi</h1>
    <?php
    date_default_timezone_set("Asia/Makassar");
    $batas_waktu = date('Y-m-d H:i:s', strtotime('+3 days'));
    $idOutlet = $_SESSION['id_outlet'];
    $query = "SELECT id, nama FROM tb_outlet WHERE id = '$idOutlet'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    echo "<h3>$data[nama]</h3>";
    ?>
    <form class="box-form" action="?page=proses_tambah_transaksi" method="post">
        </select>
        <!-- <input type="text" name="kode_invoice" value="<?= uniqid() ?>" placeholder="Kode Invoice" id="" readonly required> -->
        <select name="id_member" id="" required>
            <option value="" disabled selected> -- Pilih Member -- </option>
            <?php
            $query = "SELECT id, nama FROM tb_member";
            $result = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_assoc($result)) {
                echo "
                        <option value='$data[id]'>$data[id] | $data[nama]</option>
                    ";
            }
            ?>
        </select>
        <label for="batas_waktu">Batas Waktu</label>
        <input type="datetime-local" name="batas_waktu" id="batas_waktu" placeholder="Batas Waktu" value="<?= $batas_waktu ?>" required>
        <label for="tgl_bayar">Tanggal Bayar (Optional)</label>
        <input type="datetime-local" name="tgl_bayar" placeholder="Optional: Tanggal Bayar" id="tgl_bayar">

        <input type="number" name="biaya_tambahan" placeholder="0, jika tidak ada Biaya Tambahan" min="0" step="500" id="" required>

        <select name="status" id="" required>
            <option value="baru" selected>Baru</option>
        </select>
        <select name="dibayar" id="" required>
            <option value="belum_dibayar" selected>Belum Dibayar</option>
            <option value="dibayar">Dibayar</option>
        </select>



        <input type="submit" class="submit" name="submit" value="LIHAT DETAIL">
    </form>

</div>
