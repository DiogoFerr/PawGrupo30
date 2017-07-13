<?php
require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Lista de Utilizadores</h2>
        <table>
            <tr>
                <th>Nome do Utilizador</th>
            </tr>
            <?php
            $uManager = new userManager();
            $lista = $uManager->getUsers();
            foreach ($lista as $value) {
                if ($value['tipo'] == 2) {
                    ?>
                    <tr>
                        <td><?php echo $value['username'] ?> </td>
                        <td><a href="ApagarUtil.php?username=<?php echo $value['username'] ?>">Apagar</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </body>
</html>
