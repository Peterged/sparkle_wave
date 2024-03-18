<div class="form-container">
    <h1 class="title">Tambah Paket</h1>
    <form class="box-form" action="?page=proses_tambah_paket" method="post">
        
        <select name="id_outlet" id="">
            <?php
                $query = "SELECT id, nama FROM tb_outlet";
                $result = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_assoc($result)) {
                    echo "
                        <option value='$data[id]'>$data[id] | $data[nama]</option>
                    ";
                }
                ?>
        </select>
        <select name="jenis" id="">
            <option value="kiloan">Kiloan</option>
            <option value="selimut">Selimut</option>
            <option value="bed_cover">Bed Cover</option>
            <option value="kaos">Kaos</option>
            <option value="lain">Lain</option>
        </select>
        
        <input type="number" name="harga" placeholder="Harga, contoh: 10000" required>
        <input type="submit" class="submit" name="submit" value="TAMBAH PAKET">
    </form>
    
</div>
