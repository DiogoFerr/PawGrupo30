<?php

session_start();
require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';

$inputType = INPUT_POST;


if (filter_has_var($inputType, 'nome')) {
    $errors = array();
    if (filter_has_var($inputType, 'novoNome')) {
        $nome = filter_input($inputType, 'novoNome', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($nome) || strlen($nome) < 6 || !preg_match("/^[aA-zZ ]+/", $nome)) {
            $errors['nome'] = 'O nome tem que ter pelo menos 6 ';
        }
    } else {
        $errors['nome'] = 'O nome não existe';
    }

    if (count($errors) == 0) {

        $uManager = new userManager();
        $utilizador = $uManager->getUserByName($_SESSION['username']);

        $uManager->update_state($utilizador[0]['id'], $utilizador[0]['username'], $nome, $utilizador[0]['morada'], $utilizador[0]['contacto'], $utilizador[0]['password'], $utilizador[0]['tipo'], $utilizador[0]['estadoServer']);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/MeuPerfil.php">';
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/AlterarNome.php">';
    }
}

if (filter_has_var($inputType, 'morada')) {

    if (filter_has_var($inputType, 'novaMorada')) {
        $morada = filter_input($inputType, 'novaMorada', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($morada) || strlen($morada) < 5) {
            $errors['morada'] = 'A morada tem que ter pelo menos 10 ';
        }
    } else {
        $errors['morada'] = 'A morada não existe';
    }

    if (count($errors) == 0) {

        $uManager = new userManager();
        $utilizador = $uManager->getUserByName($_SESSION['username']);

        $uManager->update_state($utilizador[0]['id'], $utilizador[0]['username'], $utilizador[0]['nome'], $morada, $utilizador[0]['contacto'], $utilizador[0]['password'], $utilizador[0]['tipo'], $utilizador[0]['estadoServer']);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/MeuPerfil.php">';
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/AlterarMorada.php">';
    }
}

if (filter_has_var($inputType, 'contacto')) {

    if (filter_has_var($inputType, 'novoContacto')) {
        $contacto = filter_input($inputType, 'novoContacto', FILTER_SANITIZE_NUMBER_INT);
        if (!(preg_match("/^9[1236][0-9]{7}|2[1-9][0-9]{7}/", $contacto))) {
            $errors['contacto'] = 'O contacto não é valido';
        }
    } else {
        $errors['contacto'] = 'O contacto não existe';
    }

    if (count($errors) == 0) {

        $uManager = new userManager();
        $utilizador = $uManager->getUserByName($_SESSION['username']);

        $uManager->update_state($utilizador[0]['id'], $utilizador[0]['username'], $utilizador[0]['nome'], $utilizador[0]['morada'], $contacto, $utilizador[0]['password'], $utilizador[0]['tipo'], $utilizador[0]['estadoServer']);

        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/MeuPerfil.php">';
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/AlterarContacto.php">';
    }
}

if (filter_has_var($inputType, 'pass')) {
    if (filter_has_var($inputType, 'novaPass') && filter_has_var($inputType, 'cnovaPass')) {
        $password = filter_input($inputType, 'novaPass', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        $cpassword = filter_input($inputType, 'cnovaPass', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if ($password != $cpassword) {
            $errors['password'] = 'As passwords não coincidem';
        }
    } else {
        $errors['password'] = 'A password não existe';
    }
    if (count($errors) == 0) {

        $uManager = new userManager();
        $utilizador = $uManager->getUserByName($_SESSION['username']);
        $enc_password = sha1($password);
        $uManager->update_state($utilizador[0]['id'], $utilizador[0]['username'], $utilizador[0]['nome'], $utilizador[0]['morada'], $utilizador[0]['contacto'], $enc_password, $utilizador[0]['tipo'], $utilizador[0]['estadoServer']);
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/MeuPerfil.php">';
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/AlterarContacto.php">';
    }
}