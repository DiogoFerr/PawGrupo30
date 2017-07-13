<?php
require_once __DIR__ . './AtualizarPerfil.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Password</title>
    </head>
    <body>
        <h2>Meu Perfil</h2>
        <ul>
            <li>  <a href="alterarNome.php">AlterarNome</a></li>
            <li>  <a href="alterarMorada.php">AlterarMorada</a></li>
            <li>  <a href="alterarContacto.php">AlterarContacto</a></li>
            <li>  <a href="alterarPass.php">AlterarPassword</a></li>
            <li>  <a href="MeuPerfil.php">Voltar</a></li>
        </ul>
        <form method="post" action="AtualizarPerfil.php">

            <label for="novaPass">Nova Pass:</label>

            <input type="password" name="novaPass">
            
            <label for="cnovaPass">Confirmar Nova Pass:</label>

            <input type="password" name="cnovaPass">
            
            <input type="submit" name="pass" value="Alterar Pass">
            <?php if (isset($errors['pass'])) { ?>
                <p><?php echo $errors['pass'] ?></p>
            <?php } ?>
        </form>
    </body>
</html>
