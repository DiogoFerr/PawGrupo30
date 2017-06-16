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
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['username']) === false) {
            ?>
            <form action="validarLogin.php" method="post">
                <label>Username:<input type="text" name="username" required></label>
                <label>Password:<input type="password" name="password" required></label>
                <input type="submit" name="loginbutton" value="Login">
                <a href="Registo.php"><button type="button">Registar</button></a>
            </form>
            <?php
        }

        if (isset($_SESSION['username']) === true) {
            if (isset($_SESSION['estadoServer']) === '1') {
                ?>
                <h2>A sua conta ainda nao foi validada pelos Admins</h2>
                <a href="index.php"><button type="button">Retroceder</button></a>
                <?php
            }
        }


        if (isset($_SESSION['username']) === true) {
            if (isset($_SESSION['estadoServer']) === '2') {
                ?>
                <div>
                    <h2>Username: <span><?php echo $_SESSION['username'] ?></span></h2>
                    <a href="logout.php"><button type="button">Logout</button></a>
                    <a href="CriarDocumento.php"><button type="button">Doc Upload</button></a>
                </div>
                <?php
            }
        }
        ?>

        <?php
        $manager = new DocumentoManager();
        $lista = $manager->getDocuments();
        foreach ($lista as $value) {
            ?>
            <fieldset>
                <h2><?php echo $value->getTitulo() ?> </h2>
                <p><?php echo $value->getResumo() ?></p>
                <p><?php echo $value->getAutor() ?></p>
                <a href="detalhesDocumento.php?cod=<?php echo $value->getId() ?>">Mais...</a>
            </fieldset>
        <?php } ?>
    </body>
</html>

