<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $uManager = new DocumentoManager();
    $doc = $uManager->getDocById($id);

    $name = $doc[0]->getNome();
    $type = $doc[0]->getTipo();
    $size = $doc[0]->getTamanho();
    $content = $doc[0]->getConteudo();

    header("Content-length: $size");
    header("Content-type: $type");
    header("Content-Disposition: attachment; filename=$name");
    echo $content;
}
