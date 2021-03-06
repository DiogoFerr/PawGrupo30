<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'DocUtilManager.php';


$id = $_GET['id'];

$dManager = new DocumentoManager();
$doc = $dManager->getDocById($id);
$duManager = new DocUtilManager();

$data = $doc[0]->getTitulo();
$dir = "uploads";
$dirHandle = opendir($dir);
while ($file = readdir($dirHandle)) {
    if ($file === $data) {
        unlink($dir . '/' . $file);
    }
}
closedir($dirHandle);
$dManager->delete_doc($id);

$duManager->delete_doc($id);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/MeusDoc.php">';
