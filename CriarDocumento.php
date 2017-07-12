<?php
require_once __DIR__ . './Config.php';
require_once __DIR__ . './ValidarDocumento.php';

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
            <label for="categoria">Categoria: </label>
            <select for="categoria" name="categoria">            
                <option value="desporto">Desporto</option>
                <option value="musica">Musica</option>
                <option value="politica">Politica</option>
                <option value="filmes">Filmes</option>
            </select>
            <label for="palavras">Palavras Chave:</label>
            <input type="text" name="palavras" id="palavras" required="true">
            <p><?php
                if (isset($errors['palavras'])) {
                    echo $errors['palavras'];
                }
                ?></p>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="ficheiro" type="file" id="ficheiro">
            <p><?php
                if (isset($errors['ficheiro'])) {
                    echo $errors['ficheiro'];
                }
                ?></p>
            <input name="upload" type="submit" id="upload" value="upload">
            <a href="index.php"><button type="button">Cancelar</button></a>
        </form>
    </body>
</html>
