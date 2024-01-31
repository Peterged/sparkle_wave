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
    elseif($section == 'paket') {
        include_once 'components/paket.php';
    }
    elseif($section == 'member') {
        include_once 'components/member.php';
    }
    elseif($section == 'transaksi') {
        include_once 'components/transaksi.php';
    }
    elseif($section == 'laporan') {
        include_once 'components/laporan.php';
    }
