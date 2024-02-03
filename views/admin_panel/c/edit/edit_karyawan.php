<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css_komponen/form.css">
    <title>Edit Karyawan</title>
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
        <h1>Edit Karyawan</h1>
        <form class="box-form" action="../proses/proses_edit_karyawan.php?id=<?= $id ?>" method="post">
            <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?? '' ?>" autocomplete="off" required>
            <input type="text" name="username" placeholder="Username" value="<?= $data['username'] ?? '' ?>" required>
            <!-- <input type="text" name="tlp" readonly placeholder="Password" value="<?= $data['password'] ?? '' ?>" required> -->

            <select name="role">
                <option value="" disabled selected>-- Pilih Role --</option>
                <option value="admin" <?php if ($data['role'] == 'admin') {
                                            echo "selected";
                                        } ?>>Admin</option>

                <option value="kasir" <?php if ($data['role'] == 'kasir') {
                                            echo "selected";
                                        } ?>>Kasir</option>

                <option value="owner" <?php if ($data['role'] == 'owner') {
                                            echo "selected";
                                        } ?>>Owner</option>
                ?>
            </select>
            <input type="submit" class="submit" name="submit" value="EDIT OUTLET">
        </form>
    </div>
</body>

</html>