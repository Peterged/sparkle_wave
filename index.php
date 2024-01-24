<?php

include_once 'config/koneksi.php';

$pageName = @$_GET['page'] ?? 'login';

if($pageName == 'login') {
    header('Location: views/users/login.php');
} else if($pageName == 'register') {
    // code here
} else if($pageName == 'logout') {
    include_once 'views/users/logout.php';
} elseif ($pageName == 'panel') {
    header("Location: views/admin_panel/panel.php");
} else {
    include_once 'views/users/login.php';
}