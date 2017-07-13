<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'DocUtilManager.php';

require_once Config::getApplicationManagerPath() . 'ComentarioManager.php';

$username = filter_input(INPUT_GET, 'username');

$uManager = new userManager();

$dManager = new DocumentoManager();

$dcManager = new DocUtilManager();

$cManager = new ComentarioManager();

$uManager->delete_user($username);

$cManager->apagarComentarioUser($username);

$dcManager->delete_doc_user($username);

$dManager->delete_doc($username);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';

