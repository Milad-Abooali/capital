<?php

    use Mahan4\m;

    // Check Login
    if(!isset($_SESSION['M4']['user']) || !$_SESSION['M4']['user']['id']) {
        header('Location: /login');
        exit;
    }

    global $user;
