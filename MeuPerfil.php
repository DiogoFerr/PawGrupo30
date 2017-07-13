<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
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
    <img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">


    <nav><h2>Meu Perfil</h2>
        <ul>
            <li>  <a href="alterarNome.php">AlterarNome</a></li>
            <li>  <a href="alterarMorada.php">AlterarMorada</a></li>
            <li>  <a href="alterarContacto.php">AlterarContacto</a></li>
            <li>  <a href="alterarPass.php">AlterarPassword</a></li>
            <li>  <a href="index.php">Voltar</a></li>
        </ul>
    </nav>
    <div>
        <?php
        $uManager = new userManager();

        $user = $uManager->getUserByName($_SESSION['username']);
        ?>
        <label>Nome:</label>
        <label><?php echo $user[0]['nome'] ?></label>
        <label>Morada:</label>
        <label><?php echo $user[0]['morada'] ?></label>
        <label>Contacto:</label>
        <label><?php echo $user[0]['contacto'] ?></label>
    </div>
</html>
