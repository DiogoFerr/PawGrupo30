<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<?php
require_once __DIR__ . './AtualizarPerfil.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Morada</title>
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
        <form method="post" >

            <label for="novaMorada">Nova Morada:</label>

            <input type="text" name="novaMorada">

            <input type="submit" name="morada" value="Alterar Morada">
            <?php if (isset($errors['morada'])) { ?>
                <p><?php echo $errors['morada'] ?></p>
            <?php } ?>
        </form>
    </body>
</html>
