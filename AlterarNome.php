<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<?php
require_once __DIR__ . './AtualizarPerfil.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Nome</title>
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
        <form method="post" action="">
            <label for="novoNome">Novo Nome:</label>

            <input type="text" name="novoNome">

            <input type="submit" name="nome" value="Alterar Nome">

            <?php if (isset($errors['nome'])) { ?>
                <p><?php echo $errors['nome'] ?></p>
            <?php } ?>
        </form>
    </body>
</html>
