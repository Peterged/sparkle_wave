<?php
$role = @$_SESSION['role'];
if ($role == 'owner') {
    $message = '<h1>ANDA BUKAN ADMIN atau KASIR!</h1>';
    echo "<script>document.body.innerHTML = '$message'</script>";
}
?>


<div class="box karyawan">

    <a href="?page=tambah_transaksi">Tambah Transaksi</a>
    <div style="display: flex; justify-content: space-between">
        <h1 class="title">Data Transaksi</h1>
        <div>
            <form action="?page=cetak_laporan" method="post">
                <input type="date" name="tgl_awal" id="" style="color: black">
                <input type="date" name="tgl_akhir" id="" style="color: black"  >
                <input type="submit" value="Cetak Laporan" style="color: black">
            </form>
        </div>
    </div>
    <table class="tabel-data">
        <tr>
            <th>Kode Invoice</th>
            <th>Daftar Paket</th>
            <th>Tgl</th>
            <th>Batas Waktu</th>
            <th>Status</th>
            <th>Dibayar</th>
            <th colspan="3">Actions</th>
        </tr>
        <?php
        $query = "SELECT tb_transaksi.*, tb_member.nama AS nama_member FROM tb_transaksi JOIN tb_member ON tb_transaksi.id_member = tb_member.id";
        $result = mysqli_query($koneksi, $query);

        $queryData = "SELECT tb_detail_Transaksi.*, tb_paket.nama_paket, tb_paket.harga FROM tb_detail_transaksi JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id";
        $resultData = mysqli_query($koneksi, $queryData);
        $dataPaket = mysqli_fetch_all($resultData, MYSQLI_ASSOC);

        while ($data = mysqli_fetch_assoc($result)) {

        ?>

            <tr>
                <td><?= $data['kode_invoice'] ?></td>
                <td>
                    <?php
                    $total_harga = 0;
                    foreach ($dataPaket as $paket) {
                        if ($paket['id_transaksi'] == $data['id']) {
                            $total_harga += $paket['harga'];
                        }
                    }
                    foreach ($dataPaket as $paket) {
                        if ($paket['id_transaksi'] == $data['id']) {
                    ?>
                            <p>( <?= $paket['qty'] ?> ) <?= $paket['nama_paket'] ?></p>


                    <?php

                        }
                    }

                    ?>
                    <br>
                    <h3><?= number_format($total_harga, 0, ',', '.') ?></h3>
                </td>
                <td><?= $data['tgl'] ?></td>
                <td><?= $data['batas_waktu'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><?= $data['dibayar'] ?></td>





                <td><a href='?page=delete_transaksi&id=<?= $data['id'] ?>' onclick="return confirm('Apakah ingin mendelete transaksi?')">DELETE</a></td>
                <td><a href='?page=tambah_transaksi_paket&id_transaksi=<?= $data['id'] ?>'>PAKET</a></td>
                <td><a href='?page=detail_transaksi&id=<?= $data['id'] ?>'>DETAIL</a></td>

            </tr>
        <?php
        }
        ?>

    </table>
</div>
