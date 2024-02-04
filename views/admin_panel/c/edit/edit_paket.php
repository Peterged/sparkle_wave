<?php
$id = @$_GET['id'];
$query = "SELECT * FROM tb_paket WHERE id = '$id'";

$result = mysqli_query($koneksi, $query);

$data = mysqli_fetch_assoc($result);
?>
<div class="form-container">
    <h1>Edit Paket</h1>
    <form class="box-form" action="?page=proses_edit_paket&id=<?= $id ?>" method="post">
        <select name="id_outlet" id="" required>
            <option value="" disabled selected> -- Pilih Outlet -- </option>
            <?php
                $query = "SELECT id, nama FROM tb_outlet";
                $result = mysqli_query($koneksi, $query);
                while($dataOutlet = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$dataOutlet[id]' 
                            ". ($dataOutlet['id'] == $data['id_outlet'] ? 'selected' : '') . "
                        >$dataOutlet[id] | $dataOutlet[nama]</option>
                    ";
                }
                ?>
        </select>
        <select name="jenis" id="">
            <option value="" disabled selected> -- Pilih Jenis -- </option>
            <option
                value="kiloan" 
                <?php if ($data['jenis'] == 'kiloan') {echo "selected";} ?>
            >
              Kiloan
            </option>
            <option 
                value="selimut" 
                <?php if ($data['jenis'] == 'selimut') {echo "selected";} ?>
            >
              Selimut
            </option>
            <option 
                value="bed_cover" 
                <?php if ($data['jenis'] == 'bed_cover') {echo "selected";} ?>
            >
              Bed Cover
            </option>
            <option 
                value="kaos" 
                <?php if ($data['jenis'] == 'kaos') {echo "selected";} ?>
            >
              Kaos
            </option>
            <option 
                value="lainnya" 
                <?php if ($data['jenis'] == 'lainnya') {echo "selected";} ?>
            >
              Lainnya
            </option>
        </select>
    <input type="text" name="nama" placeholder="Nama Paket" value="<?= $data['nama_paket']?>" autocomplete="off" required>
    <input type="number" min="0" name="harga" placeholder="Harga, contoh: 1000" value="<?= $data['harga']?>" required>
    <input type="submit" class="submit" name="submit" value="EDIT PAKET">
</form>
</div>
