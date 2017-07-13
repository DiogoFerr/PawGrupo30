<?php
session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar Nome</title>
    </head>
    <body>
        <h2>Meu Perfil</h2>
        <ul>
            <li>  <a href="alterarNome.php">AlterarNome</a></li>
            <li>  <a href="alterarMorada.php">AlterarMorada</a></li>
            <li>  <a href="alterarContacto.php">AlterarContacto</a></li>
            <li>  <a href="alterarPass.php">AlterarPassword</a></li>
            <li>  <a href="index.php">Voltar</a></li>
        </ul>
        <form method="post" action="AtualizarPerfil.php">
            <label for="novoNome">Novo Nome:</label>
            <input type="text" name="novoNome">
            <input type="submit" name="nome" value="Alterar Nome">
        </form>
    </body>
</html>
