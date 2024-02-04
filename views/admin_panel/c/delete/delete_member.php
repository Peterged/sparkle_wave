<?php

$id = @$_GET['id'];

$query = "DELETE FROM tb_member WHERE id = '$id'";

mysqli_query($koneksi, $query);

header("Location: ?page=member");
