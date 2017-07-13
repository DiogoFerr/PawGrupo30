<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'ComentarioManager.php';

$idcomentario = filter_input(INPUT_GET, 'id');

$cManager = new ComentarioManager();

$comentario = $cManager->ComentarioPorId($idcomentario);

$cManager->apagarComentario($idcomentario);

header("location: " . Config::getRelPath(Config::getRootPath()) . "detalhesDocumento.php?id=" . $comentario[0]['idDoc']);
