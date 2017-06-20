<?php

session_start();

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';



$errors = array();
$inputType = INPUT_POST;

if (filter_has_var($inputType, 'upload')) {

    if (filter_has_var($inputType, 'autor')) {
        $autor = filter_input($inputType, 'autor', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($autor) || strlen($autor) < 6 || !preg_match("/^[a-zA-Z0-9 ]$/", $autor)) {
            $erros['autor'] = 'O autor tem que ter pelo menos 6 caracteres';
        }
    } else {
        $errors['autor'] = 'O autor não existe';
    }

    if (filter_has_var($inputType, 'titulo')) {
        $titulo = filter_input($inputType, 'titulo', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($titulo) || strlen($titulo) < 6 || !preg_match("/^[a-zA-Z0-9 ]$/", $titulo)) {
            $erros['titulo'] = 'O titulo tem que ter pelo menos 6 ';
        }
    } else {
        $errors['titulo'] = 'O titulo não existe';
    }

    if (filter_has_var($inputType, 'categoria')) {
        $categoria = filter_input($inputType, 'categoria', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($categoria) || !preg_match("/^[a-zA-Z0-9]$/", $categoria)) {
            $erros['categoria'] = 'A categoria tem que ter pelo menos 6 caracteres';
        }
    } else {
        $errors['categoria'] = 'A categoria não existe';
    }
    if (filter_has_var($inputType, 'palavras')) {
        $palavras = filter_input($inputType, 'palavras', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($palavras) || !preg_match("/^[a-zA-Z0-9 ]$/", $palavras)) {
            $erros['palavras'] = 'A palavras tem que ter pelo menos 6 caracteres';
        }
    } else {
        $errors['palavras'] = 'Ocorreu um erro com as palavras chave';
    }
    if (filter_has_var($inputType, 'resumo')) {
        $resumo = filter_input($inputType, 'resumo', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($resumo) || strlen($resumo) < 50) {
            $erros['resumo'] = 'O resumo é muito curto';
        }
    } else {
        $errors['resumo'] = 'Ocorreu um erro com o resumo';
    }


    if ($_FILES['ficheiro']['size'] > 0) {
        $fileName = $_FILES['ficheiro']['name'];
        $tmpName = $_FILES['ficheiro']['tmp_name'];
        $fileSize = $_FILES['ficheiro']['size'];
        $fileType = $_FILES['ficheiro']['type'];
        $filedate = date('y-m-d h:i:s', time());
        $username = $_SESSION['username'];
        $fp = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);
        if (!get_magic_quotes_gpc()) {
            $fileName = addslashes($fileName);
        }
    } else {
        $errors['ficheiro'] = 'Ficheiro inexistente';
    }
    if (count($errors) > 0) {
        
    } else {
        $documentomanager = new DocumentoManager();

        $documentomanager->registarDocumento(null, $fileName, $fileType, $titulo, $autor, $resumo, $categoria, $filedate, $content, $palavras, $fileSize, $estado = 1, $username);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
    }
}