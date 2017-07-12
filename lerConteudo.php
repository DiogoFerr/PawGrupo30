<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

session_start();
$idDoc = $_GET["id"];
$dManager = new DocumentoManager();

$doc = $dManager->getDocById($idDoc);
?>
<h2><?php echo $doc[0]->getConteudo() ?></h2>
<a href="detalhesDocumento.php?id=<?php echo $idDoc ?>"><button type="button">Retroceder</button></a>