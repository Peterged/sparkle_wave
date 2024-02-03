<?php
session_start();
$role = @$_SESSION['role'];
if ($role != 'admin' && $role != 'kasir') {
    echo "<h1>ANDA BUKAN ADMIN ataupun KASIR!</h1>";
    exit;
}
include_once '../../../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/register.css">
    <title>Tambah Paket</title>
</head>

<body>
    <h1>Tambah Paket</h1>
    <form class="box" action="tambah_paket_proses.php" method="post">

        <select name="id_outlet" id="">
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
        <select name="jenis" id="">
            <option value="kiloan">Kiloan</option>
            <option value="selimut">Selimut</option>
            <option value="bed_cover">Bed Cover</option>
            <option value="kaos">Kaos</option>
            <option value="lain">Lain</option>
        </select>
        <input type="text" name="nama_paket" placeholder="Nama Paket" autocomplete="off" required>
        <input type="number" name="harga" placeholder="Harga, contoh: 10000" required>
        <input type="submit" class="submit" name="submit" value="TAMBAH OUTLET">
    </form>
</body>

</html>
