<?php
    @$role = $_SESSION['role'];
    if($role != 'admin') {
        $message = "<h1>ANDA BUKAN ADMIN!</h1>";
        echo "<script>document.body.innerHTML = '$message';</script>";
    }

    $stylePath = "css_panel/form.css";
?>

<div class="box">
    <h1>LAPORAN</h1>
</div>
