<?php 
    session_start();
    include_once '../../config/database.php';
    include_once '../../models/users.php';

    $database = new Database();
    $db = $database->get_connection();

    $user = new Users($db);

    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    $user->login();

    if ($user->id != null) {
        $_SESSION['id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = $user->role;
        header('location: ../views/admin_panel/panel.php');
    } else {
        header('location: ../../views/users/login.php');
    }
