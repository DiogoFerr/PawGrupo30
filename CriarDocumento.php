<?php
require_once __DIR__ . './Config.php';
require_once __DIR__ . './ValidarDocumento.php';
require_once Config::getApplicationManagerPath() . 'userManager.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Criar Documento</title>
        <script src="<?= Config::getApplicationJSPath() . 'jquery-2.2.4.min.js' ?> "></script>
        <script src="<?= Config::getApplicationJSPath() . 'CriarDocumento.js' ?>" ></script>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data"
              <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo" required="true">
            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor" required="true">
            <label for="categoria">Categoria: </label>
            <input type="text" name="categoria" id="categoria" required="true">
            <label for="resumo">Resumo:</label>
            <textarea name="resumo" id="resumo"></textarea>
            <label for="palavras">Palavras Chave:</label>
            <input type="text" name="palavras" id="palavras" required="true">
            <label for ="data">Data de Criação: </label>
            <input type="date" id="data" name="data">
            <label>Tipo:</label>
            <input type="radio" name="tipo" checked="true" value="privado"> Privado<br>
            <input type="radio" name="tipo" value="publico"> Publico<br>
            <input type="radio" id="partilhar" name="tipo" value="partilhar"> Partilhar
            <table  hidden="true" id="partilhar" style="width:20%">
                <tr>
                    <th>Nome do Utilizador</th>
                    <th>Partilhar?</th> 
                </tr>
                <?php

                $manager = new userManager();
                $lista = $manager->getUsers();
               foreach ($lista as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value->getUsername() ?> </td>
                        <td><input id="<?php echo $value->getId() ?>" name="username" type="checkbox"></td>
                    </tr>
                <?php 
               }
                ?>
            </table>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="ficheiro" type="file" id="ficheiro">
                <input name="upload" type="submit" id="upload" value="upload">
                </form>
                </body>
                </html>
