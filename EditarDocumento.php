<?php
session_start();
require_once (realpath(dirname(__FILE__)) . '/Config.php');

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';

$id = $_GET['id'];
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
            <input type="text" name="titulo" required value="<?php echo $doc[0]->getTitulo() ?>">
            <label for="autor">Autor: </label>
            <input type="text" name="autor" required value="<?php echo $doc[0]->getAutor() ?>">

            <label for="categoria">Categoria: </label>
            <select for="categoria" name="categoria">            
                <option value="desporto">Desporto</option>
                <option value="musica">Musica</option>
                <option value="politica">Politica</option>
                <option value="filmes">Filmes</option>
            </select>

            <label for="palavras">Palavras Chave:</label>
            <input type="text" name="palavras" required value="<?php echo $doc[0]->getPalavrasChave() ?>">

            <br><input type="radio" name="tipo" checked="true" value="1"> Privado<br>
            <input type="radio" name="tipo" value="2"> Publico<br>
            <input type="radio" name="tipo" value="3"> Partilhado

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
