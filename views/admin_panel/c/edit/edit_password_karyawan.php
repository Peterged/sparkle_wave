<?php
$id = @$_GET['id'];
$query = "SELECT * FROM tb_user WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>
<div class="form-container">
    <h1>Ganti Password Karyawan</h1>
    <form class="box-form" action="?page=proses_edit_password_karyawan&id=<?= $id ?>" method="post">
        <input type="text" name="password" placeholder="Password Baru" required>
        <input type="submit" class="submit" name="submit" value="GANTI PASSWORD">
    </form>
</div>