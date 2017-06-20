<?php
session_start();
require_once (realpath(dirname(__FILE__)) . '/Config.php');
require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Meus Documentos</title>
    </head>
    <body>
        <h1>Meus Documentos </h1>
        <?php
        $docs = new DocumentoManager();
        $list = $docs->getMyDocuments($_SESSION['username']);
        foreach ($list as $value) {
            ?>
            <fieldset>
                <h2><?php echo $value->getTitulo() ?> </h2>
                <p><?php echo $value->getResumo() ?></p>
                <p><?php echo $value->getAutor() ?></p>
                <a href="EditarDocumento.php?cod=<?php echo $value->getId() ?>">Editar</a>
                <a href="detalhesDocumento.php?cod=<?php echo $value->getId() ?>">Mais...</a>
            </fieldset>
            <?php
        }
        ?>
        <a href="index.php"><button type="button">Voltar</button></a>
    </body>
</html>
