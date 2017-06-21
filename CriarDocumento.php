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
        <form method="post" enctype="multipart/form-data">
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo" required="true">
            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor" required="true">
            <label for="categoria">Categoria: </label>
            <select for="categoria" name="categoria">            
            <option value="desporto">Desporto</option>
            <option value="musica">Musica</option>
            <option value="politica">Politica</option>
            <option value="filmes">Filmes</option>
            </select>
            <label for="resumo">Resumo:</label>
            <textarea name="resumo" id="resumo"></textarea>
            <label for="palavras">Palavras Chave:</label>
            <input type="text" name="palavras" id="palavras" required="true">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="ficheiro" type="file" id="ficheiro">
            <input name="upload" type="submit" id="upload" value="upload">
            <a href="index.php"><button type="button">Cancelar</button></a>
        </form>
    </body>
</html>
