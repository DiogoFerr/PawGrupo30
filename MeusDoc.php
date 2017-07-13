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
    <img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
    <body>
        <nav>
            <h2>Username: <span><?php echo $_SESSION['username'] ?></span></h2>
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="CriarDocumento.php">Doc Upload</li>
                <li><a href="MeusDoc.php">Meus Documentos</a></li>
                <li><a href="MeuPerfil.php">Meu Perfil</a></li>
            </ul>
        </nav>
        <h1>Meus Documentos </h1>
        <?php
        $docs = new DocumentoManager();
        $list = $docs->getMyDocuments($_SESSION['username']);
        foreach ($list as $value) {
            ?>
            <fieldset>
                <h2><?php echo $value->getTitulo() ?> </h2>
                <p><?php echo $value->getResumo() ?></p>
                <p><?php echo $value->getUsername() ?></p>
                <a href="EditarDocumento.php?id=<?php echo $value->getId() ?>">Editar</a>
                <a href="ApagarDocumento.php?id=<?php echo $value->getId() ?>">Apagar</a>
                <a href="detalhesDocumento.php?id=<?php echo $value->getId() ?>">Mais...</a>

            </fieldset>
            <?php
        }
        ?>
    </body>
</html>
