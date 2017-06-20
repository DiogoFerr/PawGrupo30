<?php

require_once './Config.php';
require_once './Application/Manager/userManager.php';
require_once './Application/Model/Utilizador.php';

$uManager = new userManager();

$user = $_POST['username'];
$state = $_POST['estadoServer'];

$result= $uManager->getUserByName($user);
echo($user);
$uManager->update_state($result[0]['id'], $result[0]['username'], $result[0]['nome'], $result[0]['morada'], $result[0]['contacto'], $result[0]['password'], $result[0]['tipo'], $state);

 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/gerirusers.php">';
