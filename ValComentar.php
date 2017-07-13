<?php

session_start();
require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'ComentarioManager.php';

if (filter_has_var(INPUT_GET, 'comentario')) {

    $idDoc = filter_input(INPUT_GET, 'id');

    $username = $_SESSION['username'];

    $comentario = filter_input(INPUT_GET, 'comentario');

    $cManager = new ComentarioManager();

    $cManager->registarComentario(null, $idDoc, $username, $comentario);

     header("location: " . Config::getRelPath(Config::getRootPath()) . "detalhesDocumento.php?id=".$idDoc);
}