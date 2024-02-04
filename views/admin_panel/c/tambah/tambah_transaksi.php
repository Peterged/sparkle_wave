<div class="form-container">
    <h1 class="title">Tambah Transaksi</h1>
    <form class="box-form" action="?page=proses_tambah_transaksi" method="post">
        
        <select name="id_outlet" id="" required>
            <option value="" disabled selected> -- Pilih Outlet -- </option>
            <?php
                $query = "SELECT id, nama FROM tb_outlet";
                $result = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$data[id]'>$data[id] | $data[nama]</option>
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
                while($data = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$data[id]'>$data[id] | $data[nama]</option>
                    ";
                }
                ?>
        </select>
        <input type="datetime-local" name="batas_waktu" id="" placeholder="Batas Waktu" required>
        <input type="datetime-local" name="tgl_bayar" placeholder="Optional: Tanggal Bayar" id="" required>
        <select name="id_paket" id="">
            <option value="" disabled selected> -- Pilih Paket -- </option>
            <?php
                $query = "SELECT id, nama_paket FROM tb_paket";
                $result = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$data[id]'>$data[id] | $data[nama_paket]</option>
                    ";
                }
                ?>

        </select>
        <input type="number" name="qty" id="" placeholder="Qty Paket" min="0" required>
        <input type="number" name="biaya_tambahan" placeholder="0, jika tidak ada Biaya Tambahan" min="0" step="500" id="" required>
        <input type="number" name="diskon" id="" placeholder="0" min="0" readonly required>
        <input type="number" name="pajak" id="" placeholder="Pajak, contoh: 1000" min="0" step="200" required>
        <select name="status" id="" required>
            <option value="" disabled selected> -- Pilih Status -- </option>
            <option value="baru">Baru</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>
            <option value="diambil">Diambil</option>
        </select>
        <select name="dibayar" id="" required>
            <option value="belum_dibayar" selected>Belum Dibayar</option>
            <option value="dibayar">Dibayar</option>
        </select>
        
        <select name="id_user" id="" required>
            <option value="" disabled selected> -- Pilih Karyawan -- </option>
            <?php
                $query = "SELECT id, nama, role FROM tb_user WHERE role != 'owner' ORDER BY role DESC";
                $result = mysqli_query($koneksi, $query);
                while($dataUser = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$dataUser[id]'>[$dataUser[id], $dataUser[role]] | $dataUser[nama]</option>
                    ";
                }
                ?>
        </select>

        <textarea name="keterangan" id="" cols="30" rows="10" placeholder="Keterangan"></textarea>
        
        <input type="submit" class="submit" name="submit" value="TAMBAH TRANSAKSI">
    </form>
    
</div>
