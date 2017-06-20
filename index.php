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
        <link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
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
            $docs = new DocumentoManager();
            $list = $docs->ShowAll();
        }

        if (isset($_SESSION['username']) === true) {
            if (($_SESSION['estadoServer']) === 'admin') {
                ?>
                <div>
                    <h2>Voce é o mudafking boss</h2>
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
                <div>
                    <h2>Username: <span><?php echo $_SESSION['username'] ?></span></h2>
                    <a href="logout.php"><button type="button">Logout</button></a>
                    <a href="CriarDocumento.php"><button type="button">Doc Upload</button></a>
                    <a href="MeusDoc.php"><button type="button">Meus Documentos</button></a>
                </div>
                <?php
                $docs = new DocumentoManager();
                $list = $docs->Showoutro();
            }
        }

        if (isset($_SESSION['username']) === true) {
            if (($_SESSION['estadoServer']) === 'banido') {
                ?>
                <div>
                    <h2>Foste mandado com o caralho por ma utilização do site</h2>
                    <a href="logout.php"><button type="button">Retroceder</button></a>
                </div>
                <?php
            }
        }
        ?>


    </body>
</html>

