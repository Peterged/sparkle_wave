<div class="form-container">
    <?php
        $id = @$_GET['id'];
        $query = "SELECT * FROM tb_transaksi WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($result);
    ?>
    <h1 class="title">Edit Transaksi - <?= $data['kode_invoice'] ?></h1>

    <a href="?page=detail_transaksi&id=<?= $id ?>">DETAIL TRANSAKSI</a>
    <a href="?page=tambah_transaksi_paket&id_transaksi=<?= $id ?>">TAMBAH PAKET</a>
    <form class="box-form" action="?page=proses_edit_transaksi&id=<?= $id ?>" method="post">

        <select name="id_outlet" id="" required>
            <option value="" disabled selected> -- Pilih Outlet -- </option>
            <?php
                $query = "SELECT id, nama FROM tb_outlet";
                $result = mysqli_query($koneksi, $query);
                while($dataOutlet = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$dataOutlet[id]'
                            ". ($dataOutlet['id'] == $data['id_outlet'] ? 'selected' : '') . "
                        >$dataOutlet[id] | $dataOutlet[nama]</option>
                    ";
                }
                ?>
        </select>
        <!-- <input type="text" name="kode_invoice" value="<?= uniqid() ?>" placeholder="Kode Invoice" id="" readonly required> -->
        <select name="id_member" id="" required>
            <option value="" disabled selected> -- Pilih Member -- </option>
            <?php
                $query = "SELECT id, nama FROM tb_member";
                $result = mysqli_query($koneksi, $query);
                while($dataMember = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$dataMember[id]'
                            ". ($dataMember['id'] == $data['id_member'] ? 'selected' : '') . "
                        >$dataMember[id] | $dataMember[nama]</option>
                    ";
                }
                ?>
        </select>
        <label for="batas_waktu">Batas Waktu</label>
        <input type="datetime-local" name="batas_waktu" id="batas_waktu" placeholder="Batas Waktu" value="<?= $data['batas_waktu']; ?>" required>

        <label for="tgl_bayar">Tanggal Bayar</label>
        <input type="datetime-local" name="tgl_bayar" placeholder="Optional: Tanggal Bayar" id="tgl_bayar" value="<?= $data['tgl_bayar']; ?>" required>
        <label for="biaya_tambahan">Biaya Tambahan</label>
        <input type="number" name="biaya_tambahan" placeholder="0, jika tidak ada Biaya Tambahan" id="biaya_tambahan" value="<?= $data['biaya_tambahan']; ?>" required>
        <input type="number" hidden name="diskon" id="" placeholder="0" readonly value="<?= $data['diskon']; ?>"
        <input type="number" hidden name="pajak" value="0.075" id="" placeholder="0.075" value="<?= $data['pajak']; ?>" required readonly>
        <select name="status" id="" required>
            <option value="" disabled selected> -- Pilih Status -- </option>
            <option
                value="baru"
                <?php if ($data['status'] == 'baru') {echo "selected";} ?>
            >
              Baru
            </option>
            <option
                value="proses"
                <?php if ($data['status'] == 'proses') {echo "selected";} ?>
            >
              Proses
            </option>
            <option
                value="selesai"
                <?php if ($data['status'] == 'selesai') {echo "selected";} ?>
            >
              Selesai
            </option>
            <option
                value="diambil"
                <?php if ($data['status'] == 'diambil') {echo "selected";} ?>
            >
              Diambil
            </option>
            ?>
        </select>
        <select name="dibayar" id="">
            <option
                value="dibayar"
                <?php if($data['dibayar'] == 'dibayar') {echo "selected";}?>
            >
              Dibayar
            </option>
            <option
                value="belum_dibayar"
                <?php if($data['dibayar'] == 'belum_dibayar') {echo "selected";}?>
            >
              Belum Dibayar
            </option>
        </select>



        <input type="submit" class="submit" name="submit" value="EDIT TRANSAKSI">
    </form>

</div>
