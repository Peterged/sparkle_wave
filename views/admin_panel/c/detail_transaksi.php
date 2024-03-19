<?php
@$role = $_SESSION['role'];
if ($role == 'owner') {
    $message = "<h1>ANDA BUKAN ADMIN atau KASIR!</h1>";
    echo "<script>document.body.innerHTML = '$message';</script>";
}
$id_transaksi = $_GET['id'];
?>

<?php
$id = @$_GET['id'];
$query = "SELECT tb_transaksi.*, tbdt.id_transaksi, tbdt.id_paket, tbdt.qty FROM tb_transaksi INNER JOIN tb_detail_transaksi tbdt ON tb_transaksi.id = tbdt.id_transaksi WHERE tb_transaksi.id = '$id'";

$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);

if(!$data) {
    echo "<script>alert('Detail Transaksi tidak ditemukan!');window.location.replace('?page=transaksi');</script>";
}
?>
<div class="box detail-transaksi">
    <div class="form-container">
        <h1 class="title" onclick="window.print();">DETAIL INVOICE</h1>
        <button class="noprint" type="button" onclick="window.print()">PRINT</button>
        <div class="transaksi">
            <div class="transaksi-content">
                <div class="transaksi-header-wrapper">
                <div class="transaksi-header">
                    <table class="transaksi-header-item">
                        <tr class="title-transaksi">
                            <th class="tulisan-hitam-saat-print">Kode Invoice</th>
                            <td><?= $data['kode_invoice']; ?></td>
                        </tr>
                        <tr>
                            <?php
                            $id_outlet = $data['id_outlet'];
                            $query = "SELECT nama, id FROM tb_outlet WHERE id = '$id_outlet'";
                            $result = mysqli_query($koneksi, $query);
                            $dataOutlet = mysqli_fetch_assoc($result);
                            ?>
                            <th>Outlet</th>
                            <td><?= $dataOutlet['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= $data['tgl'] ?></td>
                        </tr>
                        <tr>
                            <th>Batas Waktu</th>
                            <td><?= $data['batas_waktu'] ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= $data['status'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="transaksi-header">
                    <?php
                    $id = $data['id_member'];
                    $query = "SELECT * FROM tb_member WHERE id = $id";
                    $result = mysqli_query($koneksi, $query);
                    $dataMember = mysqli_fetch_assoc($result);
                    ?>
                    <table class="transaksi-header-item">
                        <tr class="title-transaksi">
                            <th>Member</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Nama Member</th>
                            <td><?= $dataMember['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $dataMember['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Telpon</th>
                            <td><?= $dataMember['tlp'] ?></td>
                        </tr>
                    </table>


                </div>

                </div>
                <div class="transaksi-header-wrapper transaksi-100">
                <div class="transaksi-header transaksi-100">
                    <table class="transaksi-header-item transaksi-100">
                        <tr class="title-transaksi">
                            <th>ID User</th>
                            <td><?= $data['id_user'] ?></td>
                        </tr>
                        <tr>
                            <th>ID Outlet</th>
                            <td><?= $data['id_outlet'] ?></td>
                        </tr>
                        <tr>
                            <th>Tgl Bayar</th>
                            <td><?= $data['tgl_bayar'] ?></td>
                        </tr>
                        <tr>
                            <th>Biaya Tambahan</th>
                            <td><?= $data['biaya_tambahan'] ?></td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td><?= $data['diskon'] ?></td>
                        </tr>
                        <tr>
                            <th>Pajak</th>
                            <td><?= $data['pajak'] ?></td>
                        </tr>
                        <tr>
                            <th>Dibayar</th>
                            <td><?= $data['dibayar'] ?></td>
                        </tr>
                    </table>
                </div>
                </div>


                <div class="transaksi-body">
                <table class="tabel-data">
                    <tr>
                        <th>ID Paket</th>
                        <th>Jenis</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php
                    $query = "SELECT tb_detail_transaksi.id_paket, tb_detail_transaksi.qty, tb_paket.* FROM tb_detail_transaksi LEFT JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id WHERE tb_detail_transaksi.id_transaksi = '$id_transaksi'";
                    $result = mysqli_query($koneksi, $query);


                    $total = 0;
                    while ($dataDetailTransaksi = mysqli_fetch_assoc($result)) {
                        $subtotal = $dataDetailTransaksi['harga'] * $dataDetailTransaksi['qty'];
                        $total += $subtotal;
                        echo "
                                <tr>
                                <td>$dataDetailTransaksi[id_paket]</td>
                                <td>$dataDetailTransaksi[jenis]</td>
                                <td>$dataDetailTransaksi[nama_paket]</td>
                                <td>$dataDetailTransaksi[harga]</td>
                                <td>$dataDetailTransaksi[qty]</td>
                                <td>$subtotal</td>
                                </tr>
                            ";
                    }
                    ?>
                </table>
            </div>
            </div>

        </div>
    </div>
</div>
