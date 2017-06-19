<?php

require_once './Config.php';
require_once './Application/Manager/userManager.php';
require_once './Application/Model/Utilizador.php';

$uManager = new userManager();

$user = $_POST['username'];
$state = $_POST['estadoServer'];

$utilizador= $uManager->getUserByName($user);
echo($user);

$uManager->updateUserState($utilizador->getId(),$utilizador->getUsername(),$utilizador->getNome(),$utilizador->getMorada(),$utilizador->getContacto(),$utilizador->getPassword(),$utilizador->getTipo(),$state);





die('morreu');


