<img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
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
        <nav>
            <ul>
                <li><a href="index.php">Voltar</a></li>
            </ul>
        </nav>
        <form id="registarForm" method="POST" action="" enctype="multipart/form-data">
            <label for="nome">Username: </label>
            <input type="text" name="username" id="username" required="true">
            <p><?php
                if (isset($errors['username'])) {
                    echo $errors['username'];
                }
                ?></p>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required="true">
            <p><?php
                if (isset($errors['nome'])) {
                    echo $errors['nome'];
                }
                ?></p>
            <label for="nome">Morada: </label>
            <input type="text" name="morada" id="morada" required="true">
            <p><?php
                if (isset($errors['morada'])) {
                    echo $errors['morada'];
                }
                ?></p>
            <label for="nome">Contacto: </label>
            <input type="text" name="contacto" id="contacto" required="true">
            <p><?php
                if (isset($errors['contacto'])) {
                    echo $errors['contacto'];
                }
                ?></p>
            <label for="nome">Password: </label>
            <input type="password" name="password" id="password" required="true"><br>
            <button type="submit" name="registar" id="registar" value="registar">Registar</button>

        </form>

    </body>
</html>
