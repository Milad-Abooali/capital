<?php

    use Mahan4\m;

    // Check Login
    if(!isset($_SESSION['M4']['user']) || !$_SESSION['M4']['user']['id']) {
        header('Location: /login');
        exit;
    }

    global $user;

    global $db_main;
    $where = "type='user register'";
    $notify =  $db_main->selectRow('notify', $where);
    var_export($notify['email']);