<?php
session_start();

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

if (!isset($_SESSION['username'])) {

    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
} else {
    $idDoc = $_GET["id"];
    $dManager = new DocumentoManager();

    $doc = $dManager->getDocById($idDoc);
    ?>
    <h2><?php echo $doc[0]->getConteudo() ?></h2>
    <a href="detalhesDocumento.php?id=<?php echo $idDoc ?>"><button type="button">Retroceder</button></a>
    <?php
}
