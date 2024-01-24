<?php

$host = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'db_laundry';

$koneksi = mysqli_connect($host, $username, $password, $databaseName);

if(mysqli_connect_error()) {
    echo 'Gagal melakukan koneksi ke Database (Ada databasenya ga?) : ' . mysqli_connect_error();
    exit;
}
