<?php

    use Mahan4\email;
    use Mahan4\m;

    // Check Login
    if(!isset($_SESSION['M4']['user']) || !$_SESSION['M4']['user']['id']) {
        header('Location: /login');
        exit;
    }

    global $user;

    global $email;

    $receiver[] = [
        'id'    =>  1,
        'email' =>  'test@sfd.df',
        'data'  =>  [
            'f_name' =>  'Milad',
            'email' =>  'test@tes.fdfd'
        ]
    ];
    $email->send($receiver,'Account Created','dcdc dcdc','register');