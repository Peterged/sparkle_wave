<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Edit Karyawan</title>
</head>

<body>
    <?php
    include "../../db/includeKoneksi.php";
        $id = @$_GET['id'];
        $query = "SELECT * FROM tb_member WHERE id = '$id'";

        $result = mysqli_query($koneksi, $query);

        $data = mysqli_fetch_assoc($result);
    ?>
    <h1>Edit Member</h1>
    <form class="box" action="../proses/proses_edit_member.php?id=<?= $id ?>" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?? '' ?>" autocomplete="off" required>
        <input type="text" name="username" placeholder="Username" value="<?= $data['alamat'] ?? '' ?>" required>

        <input type="text" name="tlp" readonly placeholder="Password" value="<?= $data['jenis_kelamin'] ?? '' ?>" required>
        <input type="text" name="tlp" readonly placeholder="Telpon" value="<?= $data['tlp'] ?? '' ?>" required>
        <input type="submit" class="submit" name="submit" value="EDIT OUTLET">
    </form>
</body>
</html>
