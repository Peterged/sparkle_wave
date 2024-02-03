<?php
    @$role = $_SESSION['role'];
    if($role != 'admin') {
        $message = "<h1>ANDA BUKAN ADMIN!</h1>";
        echo "<script>document.body.innerHTML = '$message';</script>";
    }
?>

<div class="box">
    <h1>TRANSAKSI</h1>
</div>
