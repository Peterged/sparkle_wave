<div class="form-container">
    <?php 
        $id = @$_GET['id'];
        $query = "SELECT * FROM tb_transaksi WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_assoc($result);
    ?>
    <h1 class="title">Edit Transaksi - <?= $data['kode_invoice'] ?></h1>
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
        <input type="datetime-local" name="batas_waktu" id="" placeholder="Batas Waktu" value="<?= $data['batas_waktu']; ?>" required>
        <input type="datetime-local" name="tgl_bayar" placeholder="Optional: Tanggal Bayar" id="" value="<?= $data['tgl_bayar']; ?>" required>
        <input type="number" name="biaya_tambahan" placeholder="0, jika tidak ada Biaya Tambahan" id="" value="<?= $data['biaya_tambahan']; ?>" required>
        <input type="number" name="diskon" id="" placeholder="0" readonly value="<?= $data['diskon']; ?>" required>
        <input type="number" name="pajak" id="" placeholder="Pajak, contoh: 5000" value="<?= $data['pajak']; ?>" required>
        <select name="status" id="" required>
            <option value="" disabled selected> -- Pilih Status -- </option>
            <option 
                value="baru" 
                <?php if ($data['status'] == 'baru') {echo "selected";} ?>
            >
              Baru
            </option>
            <option 
                value="admin" 
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
        
        <select name="id_user" id="" required>
            <option value="" disabled selected> -- Pilih Karyawan -- </option>
            <?php
                $query = "SELECT id, nama, role FROM tb_user WHERE role != 'owner'";
                $result = mysqli_query($koneksi, $query);
                while($dataUser = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$dataUser[id]' 
                            ". ($dataUser['id'] == $data['id_user'] ? 'selected' : '') . "
                        >[$dataUser[id], $dataUser[role]] | $dataUser[nama]</option>
                    ";
                }
                ?>
        </select>
        
        <input type="submit" class="submit" name="submit" value="EDIT TRANSAKSI">
    </form>
    
</div>
