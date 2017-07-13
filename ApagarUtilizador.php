<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
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
        <nav>
            <h2>Bem-vindo Administrador</h2>
            <ul>
                <li><a href="gerirUsers.php">Aprovar Contas</a></li>
                <li><a href="ApagarUtilizador.php">Apagar Utilizador</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
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
                        <td id="none"><?php echo $value['username'] ?> </td>
                        <td><a href="ApagarUtil.php?username=<?php echo $value['username'] ?>">Apagar</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </body>
</html>
