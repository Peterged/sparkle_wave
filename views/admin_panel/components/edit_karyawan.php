<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/register.css">
    <title>Edit Karyawan</title>
</head>

<body>
    <?php
    include '../../../config/koneksi.php';
        $id = @$_GET['id'];
        $query = "SELECT * FROM tb_user WHERE id = '$id'";

        $result = mysqli_query($koneksi, $query);

        $data = mysqli_fetch_assoc($result);
    ?>
    <h1>Edit Outlet</h1>
    <form class="box" action="edit_karyawan_proses.php?id=<?= $id ?>" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?? '' ?>" autocomplete="off" required>
        <input type="text" name="username" placeholder="Username" value="<?= $data['username'] ?? '' ?>" required>
        <!-- <input type="text" name="tlp" readonly placeholder="Password" value="<?= $data['password'] ?? '' ?>" required> -->

        <select name="id_outlet">
            <?php
                if($data['role'] == 'admin') {
                    echo "<option selected value='admin'>Admin</option>";
                    echo "<option value='kasir'>Kasir</option>";
                    echo "<option value='owner'>Owner</option>";
                }
                elseif($data['role'] == 'kasir') {
                    echo "<option value='admin'>Admin</option>";
                    echo "<option selected value='kasir'>Kasir</option>";
                    echo "<option value='owner'>Owner</option>";
                }
                else {
                    echo "<option value='admin'>Admin</option>";
                    echo "<option value='kasir'>Kasir</option>";
                    echo "<option selected value='owner'>Owner</option>";
                }
            ?>
        </select>
        <input type="submit" class="submit" name="submit" value="EDIT OUTLET">
    </form>
</body>
</html>
