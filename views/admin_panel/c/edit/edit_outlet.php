<?php
$id = @$_GET['id'];
$query = "SELECT * FROM tb_outlet WHERE id = '$id'";

$result = mysqli_query($koneksi, $query);

$data = mysqli_fetch_assoc($result);
?>
<div class="form-container">
<h1>Edit Outlet</h1>
<form class="box-form" action="?page=proses_edit_outlet&id=<?= $id ?>" method="post">
    <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama'] ?? '' ?>" autocomplete="off" required>
    <input type="text" name="alamat" placeholder="Alamat" value="<?= $data['alamat'] ?? '' ?>" required>
    <input type="text" name="tlp" placeholder="Telpon" value="<?= $data['tlp'] ?? '' ?>" required>
    <input type="submit" class="submit" name="submit" value="EDIT OUTLET">
</form>
</div>
