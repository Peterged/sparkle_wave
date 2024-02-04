<?php
$id = @$_GET['id'];
$query = "SELECT * FROM tb_member WHERE id = '$id'";

$result = mysqli_query($koneksi, $query);

$data = mysqli_fetch_assoc($result);
?>
<div class="form-container">
    <h1 class="title">Edit Member</h1>
    <form class="box-form" action="?page=proses_edit_member&id=<?= $id ?>" method="post">
        <input type="text" name="nama" placeholder="Nama" value="<?= $data['nama']?>" autocomplete="off" required>
        <input type="text" name="alamat" placeholder="Alamat" value="<?= $data['alamat']?>" required>
        <select name="jenis_kelamin" id="">
        <option value="L" <?php if ($data['jenis_kelamin'] == 'L') {
                                        echo "selected";
                                    } ?>>
                Laki - Laki
            </option>
            <option value="P" <?php if ($data['jenis_kelamin'] == 'P') {
                                        echo "selected";
                                    } ?>>
                Perempuan
            </option>
        </select>
            
        <input type="text" name="tlp" placeholder="Telpon" value="<?= $data['tlp']?>" required>
        <input type="submit" class="submit" name="submit" value="EDIT MEMBER">
    </form>
</div>