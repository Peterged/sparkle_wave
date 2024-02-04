<?php
$id = @$_GET['id'];
$query = "SELECT * FROM tb_user WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>
<div class="form-container">
    <h1>Edit Karyawan</h1>
    <form class="box-form" action="?page=proses_edit_karyawan&id=<?= $id ?>" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?>" autocomplete="off" required>
        <input type="text" name="username" placeholder="Username" value="<?= $data['username'] ?>" required>
        <!-- <input type="text" name="tlp" readonly placeholder="Password" value="<?= $data['password'] ?>" required> -->

        <select name="role">
            <option value="" disabled>-- Pilih Role --</option>
            <option value="admin" <?php if ($data['role'] == 'admin') {
                                        echo "selected";
                                    } ?>>
                Admin
            </option>
            <option value="admin" <?php if ($data['role'] == 'kasir') {
                                        echo "selected";
                                    } ?>>
                Kasir
            </option>
            <option value="admin" <?php if ($data['role'] == 'owner') {
                                        echo "selected";
                                    } ?>>
                Owner
            </option>
            ?>
        </select>
        <input type="submit" class="submit" name="submit" value="EDIT KARAWAN">
    </form>
</div>