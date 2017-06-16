<?php

require_once (realpath(dirname(__FILE__)) . '/Config.php');
require_once (Config::getApplicationManagerPath() . 'userManager.php');

if (filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)) {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $manager = new userManager();
    $enc_pass = sha1($password);
    $state;


    if ($manager->exists_login($username, $enc_pass)) {
        session_start();
        $state=$manager->gettingUserServerState($state);
        $_SESSION['username'] = $username;
        $_SESSION['estadoServer'] = $state;

        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
    }
} else {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
}

// linha 9) if ($manager->exists_login(filter_input(INPUT_POST, 'username'), filter_input(INPUT_POST, 'password'))) {