<?php

$id = @$_GET['id'];

$query = "DELETE FROM tb_outlet WHERE id = '$id'";

mysqli_query($koneksi, $query);

header("Location: ?page=outlet");
