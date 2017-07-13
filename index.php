<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();

require_once (realpath(dirname(__FILE__)) . '/Config.php');
require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';
require_once Config::getApplicationManagerPath() . 'DocUtilManager.php';
?>

<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
    </head>
    <img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
    <body>

        <?php
        if (isset($_SESSION['username']) === false) {
            ?>
            <nav>
                <form action="validarLogin.php" method="post">
                    <label>Username:<input type="text" name="username" required></label>
                    <label>Password:<input type="password" name="password" required></label>
                    <input type="submit" name="loginbutton" value="Login">
                    <a href="Registo.php"><button type="button">Registar</button></a>
                </form>
                <form method="get" action="pesquisa.php">
                    <input type="text" name="pesquisa">
                    <select name="campo" required>
                        <option value="titulo">Titulo</option>
                        <option value="autor">Autor</option>
                        <option value="categoria">Categoria</option>
                    </select>
                    <input type="submit"name="pesquisar" value="pesquisar">
                </form>
            </nav>
            <?php
            $manager = new DocumentoManager();
            $lista = $manager->getPublicDocuments();
            ?><h1>Docs Publicos</h1><?php
            foreach ($lista as $value) {
                ?>
                <fieldset>
                    <h2>Titulo: <?php echo $value->getTitulo() ?> </h2>
                    <p>Resumo: <?php echo $value->getResumo() ?></p>
                    <p>Autor: <?php echo $value->getUsername() ?></p>
                    <a href="detalhesDocumento.php?id=<?php echo $value->getId() ?>">Mais...</a>
                </fieldset>

                <?php
            }
        }

        if (isset($_SESSION['username']) === true) {
            if (($_SESSION['estadoServer']) === 'admin') {
                ?>
                <div>
                    <h2>Bem-vindo Administrador</h2>
                    <a href="areaAdmin.php"><button type="button">AreaAdmin</button></a>
                    <a href="logout.php"><button type="button">Loggout</button></a>
                </div>
                <?php
            }
        }

        if (isset($_SESSION['username']) === true) {
            if (($_SESSION['estadoServer']) === 'registado') {
                ?>
                <div>
                    <h2>A sua conta ainda nao foi validada pelos Admins</h2>
                    <a href="logout.php"><button type="button">Retroceder</button></a>
                </div>
                <?php
            }
        }

        if (isset($_SESSION['username']) === true) {
            if (($_SESSION['estadoServer']) === 'aprovado') {
                ?>
                <div id="loged">
                    <h2>Username: <span><?php echo $_SESSION['username'] ?></span></h2>
                    <form method="get" action="pesquisa.php">
                        <input type="text" name="pesquisa">
                        <select name="campo" required>
                            <option value="titulo">Titulo</option>
                            <option value="autor">Autor</option>
                            <option value="categoria">Categoria</option>
                        </select>
                        <input type="submit"name="pesquisar" value="pesquisar">
                    </form>
                    <ul>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="CriarDocumento.php">Doc Upload</li>
                        <li><a href="MeusDoc.php">Meus Documentos</a></li>
                        <li><a href="MeuPerfil.php">Meu Perfil</a></li>
                    </ul>
                </div>
                <?php
                $docs = new DocumentoManager();
                ?><h1>Docs Publicos</h1><?php
                $list = $docs->Showoutro();
                $docsP = new DocUtilManager();
                ?><h1>Docs Partilhados</h1><?php
                $partilhados = $docsP->getDocByUsername($_SESSION['username']);
                foreach ($partilhados as $value) {
                    $doc = $docs->getDocById($value->getCodDoc());
                    ?>
                    <fieldset>
                        <h2><?php echo $doc[0]->getTitulo() ?> </h2>
                        <p><?php echo $doc[0]->getResumo() ?></p>
                        <p><?php echo $doc[0]->getUsername() ?></p>
                        <a href="detalhesDocumento.php?id=<?php echo $doc[0]->getId() ?>">Mais...</a>
                    </fieldset>
                    <?php
                }
            }
        }
        if (isset($_SESSION['username']) === true) {
            if (($_SESSION['estadoServer']) === 'banido') {
                ?>
                <div>
                    <h2>Voce foi expulso de utilizar o site. Pedimos desculpa pelo incomodo</h2>
                    <a href="logout.php"><button type="button">Retroceder</button></a>
                </div>
                <?php
            }
        }
        ?>
    </body>

</html>
