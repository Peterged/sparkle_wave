<?php
    $section = @$_GET['page'];

    switch($section) {
        case 'dashboard': include_once 'components/dashboard.php'; break;

        case 'outlet': include_once 'components/outlet.php'; break;

        case 'karyawan': include_once 'components/karyawan.php'; break;

        case 'paket': include_once 'components/paket.php'; break;

        case 'member': include_once 'components/member.php'; break;

        case 'transaksi': include_once 'components/transaksi.php'; break;

        case 'laporan': include_once 'components/laporan.php'; break;

        case 'register': include_once '../users/register.php'; break;


        // TAMBAH
        case 'tambah_karyawan': include_once 'components/tambah/tambah_karyawan.php'; break;

        case 'tambah_outlet': include_once 'components/tambah/tambah_outlet.php'; break;

        case 'tambah_paket': include_once 'components/tambah/tambah_paket.php'; break;

        case 'tambah_member': include_once 'components/tambah/tambah_member.php'; break;

        case 'tambah_transaksi': include_once 'components/tambah/tambah_transaksi.php'; break;

        case 'tambah_laporan': include_once 'components/tambah/tambah_laporan.php'; break;


        // EDIT
        case 'edit_karyawan': include_once 'components/edit/edit_karyawan.php'; break;

        case 'edit_outlet': include_once 'components/edit/edit_outlet.php'; break;

        case 'edit_paket': include_once 'components/edit/edit_paket.php'; break;

        case 'edit_member': include_once 'components/edit/edit_member.php'; break;

        case 'edit_transaksi': include_once 'components/edit/edit_transaksi.php'; break;

        case 'edit_laporan': include_once 'components/edit/edit_laporan.php'; break;


        // PROSES EDIT
        case 'proses_edit_karyawan': include_once 'components/edit/proses_edit_karyawan'; break;

        case 'proses_edit_outlet': include_once 'components/edit/proses_edit_outlet'; break;

        case 'proses_edit_paket': include_once 'components/edit/proses_edit_paket'; break;

        case 'proses_edit_member': include_once 'components/edit/proses_edit_member'; break;

        case 'proses_edit_transaksi': include_once 'components/edit/proses_edit_transaksi'; break;

        case 'proses_edit_laporan': include_once 'components/edit/proses_edit_laporan'; break;


        // DELETE
        case 'delete_karyawan': include_once 'components/delete/delete_karyawan.php'; break;

        case 'delete_outlet': include_once 'components/delete/delete_outlet.php'; break;

        case 'delete_paket': include_once 'components/delete/delete_paket.php'; break;

        case 'delete_member': include_once 'components/delete/delete_member.php'; break;

        case 'delete_transaksi': include_once 'components/delete/delete_transaksi.php'; break;

        case 'delete_laporan': include_once 'components/delete/delete_laporan.php'; break;


        // DEFAULT (jika tidak ada halaman)
        default: include_once 'components/dashboard.php'; break;
    }
