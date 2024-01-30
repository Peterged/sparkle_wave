


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/login.css">
    <title>Edit Outlet</title>
</head>

<body>
    <?php
    include '../../../config/koneksi.php';
        $id = @$_GET['id'];
        $query = "SELECT * FROM tb_outlet WHERE id = '$id'";

        $result = mysqli_query($koneksi, $query);

        $data = mysqli_fetch_assoc($result);
        print_r($data);
    ?>
    <h1>Edit Outlet</h1>
    <form class="box" action="components/outlet_edit_proses.php" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?? '' ?>" autocomplete="off" required>
        <input type="password" name="alamat" placeholder="Alamat" value="<?= $data['alamat'] ?? '' ?>" required>
        <input type="password" name="tlp" placeholder="Telpon" value="<?= $data['tlp'] ?? '' ?>" required>
        <input type="submit" class="submit" name="submit" value="EDIT OUTLET">
    </form>
</body>
</html>
