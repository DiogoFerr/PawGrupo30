<?php
session_start();
require_once (realpath(dirname(__FILE__)) . '/Config.php');

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';

$id = $_GET['cod'];
$dManager = new DocumentoManager();
$doc = $dManager->getDocById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Documento</title>
    </head>
    <body>
        <form method="post" action="ValidarEditar.php" enctype="multipart/form-data">

            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo" required="true">
            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor" required="true">
            <label for="categoria">Categoria: </label>
            <input type="text" name="categoria" id="categoria" required="true">
            <label for="palavras">Palavras Chave:</label>
            <input type="text" name="palavras" id="palavras" required="true">

            <input type="radio" name="tipo" value="male"> Male<br>
            <input type="radio" name="tipo" value="female"> Female<br>
            <input type="radio" name="tipo" value="other"> Other

            <table   id="partilhar" style="width:20%">
                <tr>
                    <th>Nome do Utilizador</th>
                    <th>Partilhar?</th> 
                </tr>
                <?php
                $manager = new userManager();
                $lista = $manager->getUsers();
                foreach ($lista as $value) {
                    if (!($_SESSION['username'] == $value['username'])) {
                        if ($value['estadoServer'] == 'aprovado') {
                            ?>
                            <tr>
                                <td><?php echo $value['username'] ?> </td>
                                <td><input value="<?php echo $value['id'] ?>" name="username<?php echo $value['id'] ?>" type="checkbox"></td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
            </table>
            <input type="text" name="cod" value="<?php echo $doc[0]->getId() ?>" hidden="true" id="cod" >
            <input name="editar" type="submit" id="editar">
        </form>
        <a href="MeusDoc.php"><button type="button">Voltar</button></a>
    </body>
</html>
