<?php
    $section = @$_GET['page'];
    if($section == 'dashboard') {
        include_once 'components/dashboard.php';
    }
    elseif($section == 'outlet') {
        include_once 'components/outlet.php';
    }
    elseif($section == 'karyawan') {
        include_once 'components/karyawan.php';
    }
    elseif($section == 'package') {
        include_once 'components/package.php';
    }
    elseif($section == 'pelanggan') {
        include_once 'components/pelanggan.php';
    }
    elseif($section == 'transaksi') {
        include_once 'components/transaksi.php';
    }
