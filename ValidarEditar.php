<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocUtilManager.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';

$inputType = INPUT_POST;

if (filter_has_var($inputType, 'cod')) {

    $id = filter_input($inputType, 'cod');

    $dManager = new DocumentoManager();

    $doc = $dManager->getDocById($id);

    if (filter_has_var($inputType, 'autor')) {
        $autor = filter_input($inputType, 'autor', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($autor) || strlen($autor) < 6 || !preg_match("/^[a-zA-Z0-9 ]$/", $autor)) {
            $erros['autor'] = 'O autor tem que ter pelo menos 6 caracteres';
        }
    } else {
        $autor = $doc['autor'];
    }

    if (filter_has_var($inputType, 'titulo')) {
        $titulo = filter_input($inputType, 'titulo', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($titulo) || strlen($titulo) < 6 || !preg_match("/^[a-zA-Z0-9 ]$/", $titulo)) {
            $erros['titulo'] = 'O titulo tem que ter pelo menos 6 ';
        }
    } else {
        $titulo = $doc['titulo'];
    }

    if (filter_has_var($inputType, 'categoria')) {
        $categoria = filter_input($inputType, 'categoria', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($categoria) || !preg_match("/^[a-zA-Z0-9]$/", $categoria)) {
            $erros['categoria'] = 'A categoria tem que ter pelo menos 6 caracteres';
        }
    } else {
        $categoria = $doc['categoria'];
    }
    if (filter_has_var($inputType, 'palavras')) {
        $palavras = filter_input($inputType, 'palavras', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($palavras) || !preg_match("/^[a-zA-Z0-9 ]$/", $palavras)) {
            $erros['palavras'] = 'A palavras tem que ter pelo menos 6 caracteres';
        }
    } else {
        $palavras = $doc['palavras'];
    }

    if (filter_has_var($inputType, 'tipo')) {
        $docUtilManager = new DocUtilManager();
        $manager = new userManager();
        $lista = $manager->getUsers();
        if (filter_input($inputType, 'tipo') == 1) {
            $estado = 1;
            foreach ($lista as $value) {
                if (($docUtilManager->getExiste($doc[0]->getId(), $value['username']))) {
                    $docUtilManager->delete_doc_user($value['username']);
                }
            }
        } else if (filter_input($inputType, 'tipo') == 2) {
            $estado = 2;
            foreach ($lista as $value) {
                if (($docUtilManager->getExiste($doc[0]->getId(), $value['username']))) {
                    $docUtilManager->delete_doc_user($value['username']);
                }
            }
        } else {
            $estado = 3;

            foreach ($lista as $value) {
                if (filter_has_var($inputType, 'username' . $value['id'])) {
                    $docUtilManager->registarDocumentoPartilhado(null, $doc[0]->getId(), $value['username']);
                }
            }
        }

        $dManager->updateDocumento($doc[0]->getId(), $doc[0]->getNome(), $doc[0]->getTipo(), $titulo, $autor, $doc[0]->getResumo(), $categoria, $doc[0]->getDataCriacao(), $doc[0]->getConteudo(), $palavras, $doc[0]->getTamanho(), $estado, $doc[0]->getUsername());
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/MeusDoc.php">';
    }
} 