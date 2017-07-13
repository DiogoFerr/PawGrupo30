<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';


$inputType = INPUT_POST;

if (filter_has_var($inputType, 'registar')) {
    $errors = array();

    if (filter_has_var($inputType, 'username')) {
        $username = filter_input($inputType, 'username', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($username) || strlen($username) < 6 || !preg_match("/^[aA-zZ0-9]+/", $username)) {
            $errors['username'] = 'O username tem que ter pelo menos 6 ';
        }
    } else {
        $errors['username'] = 'O username não existe';
    }

    if (filter_has_var($inputType, 'nome')) {
        $nome = filter_input($inputType, 'nome', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($nome) || strlen($nome) < 6 || !preg_match("/^[aA-zZ ]+/", $nome)) {
            $errors['nome'] = 'O nome tem que ter pelo menos 6 ';
        }
    } else {
        $errors['nome'] = 'O nome não existe';
    }

    if (filter_has_var($inputType, 'morada')) {
        $morada = filter_input($inputType, 'morada', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($morada) || strlen($morada) < 5) {
            $errors['morada'] = 'A morada tem que ter pelo menos 10 ';
        }
    } else {
        $errors['morada'] = 'A morada não existe';
    }
    if (filter_has_var($inputType, 'contacto')) {
        $contacto = filter_input($inputType, 'contacto', FILTER_SANITIZE_NUMBER_INT);
        if (!(preg_match("/^9[1236][0-9]{7}|2[1-9][0-9]{7}/", $contacto))) {
            $errors['contacto'] = 'O contacto não é valido';
        }
    } else {
        $errors['contacto'] = 'O contacto não existe';
    }
    if (filter_has_var($inputType, 'password')) {
        $password = filter_input($inputType, 'password', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        $errors['password'] = 'A password não existe';
    }
    $tipo = 2;
    $estadoServer = 'registado';
    $manager = new userManager();
    if ($manager->utilizadorExists($username)) {
        $errors['username'] = 'utilizador existente';
    }
    if (count($errors) > 0) {
        
    } else {
        $manager->registarUtilizador(NULL, $username, $nome, $morada, $contacto, $password, $tipo, $estadoServer);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
    }
}
    