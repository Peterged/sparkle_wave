<?php 

include_once 'config/database.php';

$pageName = @$_GET['page'] ?? 'login';

if($pageName == 'login') {
    include_once 'views/users/login.php';
} else if($pageName == 'register') {
    include_once 'views/users/register.php';
} else if($pageName == 'logout') {
    include_once 'views/users/logout.php';
} elseif ($pageName == 'panel') {
    include_once 'views/admin_panel/panel.php';
} else {
    include_once 'views/users/login.php';
}