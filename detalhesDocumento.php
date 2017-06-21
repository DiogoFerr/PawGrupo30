<?php
require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

$idDoc = $_GET["id"];

$dManager= new DocumentoManager();
$doc = $dManager->getDocById($idDoc);

?>
<h2>Titulo: <?php echo $doc[0]->getTitulo() ?></h2>
<h2>Autor: <?php echo $doc[0]->getAutor() ?></h2>
<h2>Resumo: <?php echo $doc[0]->getResumo() ?></h2>
<h2>Categoria: <?php echo $doc[0]->getCategoria() ?></h2>
<h2>Data de criação: <?php echo $doc[0]->getDataCriacao() ?></h2>
<h2>Palavras Chave: <?php echo $doc[0]->getPalavrasChave() ?></h2>
<a href="index.php"><button type="button">Retroceder</button></a>
<a href="download.php?id=<?php echo $idDoc ?>"><button type="button">Download</button></a>
<a href="lerConteudo.php?id=<?php echo $idDoc ?>"><button type="button">Ler</button></a>



