<?php
require_once __DIR__ . './Config.php';
require_once __DIR__ . './ValRegistar.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registar</title>
        <script src="<?= Config::getApplicationJSPath() . 'jquery-2.2.4.min.js' ?> "></script>
        <script src="<?= Config::getApplicationJSPath() . 'RegistarVal.js' ?>" ></script>
    </head>
    <body>
        <form id="registarForm" method="POST" action="" enctype="multipart/form-data">
            <label for="nome">Username: </label>
            <input type="text" name="username" id="username" required="true">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required="true">
            <label for="nome">Morada: </label>
            <input type="text" name="morada" id="morada" required="true">
            <label for="nome">Contacto: </label>
            <input type="text" name="contacto" id="contacto" required="true">
            <label for="nome">Password: </label>
            <input type="password" name="password" id="password" required="true">
            <button type="submit" name="registar" id="registar" value="registar">Registar</button>

        </form>
        <p><?php
            if (isset($errors)) {
                print_r($errors);
            }
            ?></p>
    </body>
</html>