<?php

    use Mahan4\email;
    use Mahan4\m;

    // Check Login
    if(!isset($_SESSION['M4']['user']) || !$_SESSION['M4']['user']['id']) {
        header('Location: /login');
        exit;
    }

    global $user;


    $email = new email();
    $receiver[] = [
        'id'    =>  1,
        'email' =>  'test@sfd.df',
        'data'  =>  [
            'fname' =>  'name',
            'lname' =>  'abooo',
            'email' =>  'test@sfd.df'
        ]
    ];
    $email->send($receiver,'Account Created','','register');