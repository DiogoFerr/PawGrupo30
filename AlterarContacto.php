<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<?php
require_once __DIR__ . './AtualizarPerfil.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Contacto</title>
    </head>
    <img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
    <body>
        <nav><h2>Meu Perfil</h2>
            <ul>
                <li>  <a href="alterarNome.php">AlterarNome</a></li>
                <li>  <a href="alterarMorada.php">AlterarMorada</a></li>
                <li>  <a href="alterarContacto.php">AlterarContacto</a></li>
                <li>  <a href="alterarPass.php">AlterarPassword</a></li>
                <li>  <a href="MeuPerfil.php">Voltar</a></li>
            </ul>
        </nav>
        <form method="post" action="AtualizarPerfil.php">

            <label for="novoContacto">Novo Contacto:</label>

            <input type="text" name="novoContacto">

            <input type="submit" name="contacto" value="Alterar Contacto">
            <?php if (isset($errors['contacto'])) { ?>
                <p><?php echo $errors['contacto'] ?></p>
            <?php } ?>
        </form>
    </body>
</html>
