<?php

session_start();

require_once './Config.php';

if ($_SESSION['username']) {
    session_unset($_SESSION['username']);
    session_destroy();
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
}

