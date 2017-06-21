<a href="areaAdmin.php"><button type="button">Voltar</button></a>
<?php

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath(). 'userManager.php';

$userManager = new userManager();
$users = $userManager->getUsers();
?>
<h1>Lista de users: </h1>
<hr>
<h2>Registados</h2>
<?php
foreach ($users as $valueU) {
    if ($valueU['tipo'] === '2') {
        if ($valueU['estadoServer'] === 'registado') {
            ?>
            <h4>Username: <?php echo $valueU['username'] ?></h4>
            <a href="editarUser.php?username=<?php echo $valueU['username']; ?>">Editar</a>
            <?php
        }
    }
}
?>
<hr>
<h2>Aprovados</h2>
<?php
foreach ($users as $valueU) {
    if ($valueU['tipo'] === '2') {
        if ($valueU['estadoServer'] === 'aprovado') {
            ?>
            <h4>Username: <?php echo $valueU['username'] ?></h4>
            <a href="editarUser.php?username=<?php echo $valueU['username']; ?>">Editar</a>
            <?php
        }
    }
}
?>
<hr>
<h2>Banidos:</h2>
<?php
foreach ($users as $valueU) {
    if ($valueU['tipo'] === '2') {
        if ($valueU['estadoServer'] === 'banido') {
            ?>
            <h4>Username: <?php echo $valueU['username'] ?></h4>
            <a href="editarUser.php?username=<?php echo $valueU['username']; ?>">Editar</a>
            <?php
        }
    }
}