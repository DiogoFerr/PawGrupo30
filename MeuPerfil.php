<?php
session_start();

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Meu Perfil</title>
    </head>
    <body>
        <h2>Meu Perfil</h2>
        <?php
        $uManager = new userManager();

        $user = $uManager->getUserByName($_SESSION['username']);
        ?>
        <ul>
            <li>  <a href="alterarNome.php">AlterarNome</a></li>
            <li>  <a href="alterarMorada.php">AlterarMorada</a></li>
            <li>  <a href="alterarContacto.php">AlterarContacto</a></li>
            <li>  <a href="alterarPass.php">AlterarPassword</a></li>
            <li>  <a href="index.php">Voltar</a></li>
        </ul>
        <label>Nome:</label>
        <label><?php echo $user[0]['nome'] ?></label>
        <label>Morada:</label>
        <label><?php echo $user[0]['morada'] ?></label>
        <label>Contacto:</label>
        <label><?php echo $user[0]['contacto'] ?></label>

    </body>
</html>
