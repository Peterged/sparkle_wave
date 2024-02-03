<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css_komponen/form.css">
    <title>Edit Password Karyawan</title>
</head>

<body>
    <?php
    include '../../db/includeKoneksi.php';
    $id = @$_GET['id'];
    $query = "SELECT * FROM tb_user WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    ?>
    <div class="form-container">
        <h1>Ganti Password Karyawan</h1>
        <form class="box-form" action="../proses/proses_edit_password_karyawan.php?id=<?= $id ?>" method="post">
            <input type="text" name="password" placeholder="Password" required>
            <input type="submit" class="submit" name="submit" value="EDIT OUTLET">
        </form>
    </div>
</body>

</html>