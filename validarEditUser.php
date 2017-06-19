<?php

require_once './Config.php';
require_once './Application/Manager/userManager.php';
require_once './Application/Model/Utilizador.php';

$uManager = new userManager();

$user = $_POST['username'];
$state = $_POST['estadoServer'];

$result= $uManager->getUserByName($user);
echo($user);






die('morreu');


