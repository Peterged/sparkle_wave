


<head>
    <link rel="stylesheet" href="../../../../css/register.css">   
    <title>Tambah Member</title>
</head>

<body>
    <h1>Tambah Member</h1>
    <form class="box" action="tambah_member_proses.php" method="post">
        <input type="text" name="nama" placeholder="Nama" autocomplete="off" required>
        <input type="text" name="alamat" placeholder="Alamat" required>
        <select name="kelamin" id="" required>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
        </select>
        <input type="text" name="tlp" placeholder="Telpon" required>
        <input type="submit" class="submit" name="submit" value="TAMBAH MEMBER">
    </form>
</body>
</html>
