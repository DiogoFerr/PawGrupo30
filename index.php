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
        <h2>ja da oh boi!</h2>
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
            ?>
            <div>
                <h2>Username: <span><?php echo $_SESSION['username'] ?></span></h2>
                <a href="logout.php"><button type="button">Logout</button></a>
            </div>
            <?php
        }
        ?>
        
        <?php

                $manager = new DocumentoManager();
                $lista = $manager->getUsers();
               foreach ($lista as $value) {}?>
    </body>
</html>

