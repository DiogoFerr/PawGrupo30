<img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
<?php
session_start();
require_once (realpath(dirname(__FILE__)) . '/Config.php');

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'userManager.php';

$id = filter_input(INPUT_GET, 'id');
$dManager = new DocumentoManager();
$doc = $dManager->getDocById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Documento</title>
    </head>
    <body>
        <nav>
            <h2>Username: <span><?php echo $_SESSION['username'] ?></span></h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="CriarDocumento.php">Doc Upload</li>
                <li><a href="MeusDoc.php">Meus Documentos</a></li>
                <li><a href="MeuPerfil.php">Meu Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <form method="post" action="ValidarEditar.php" enctype="multipart/form-data">

            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" required value="<?php echo $doc[0]->getTitulo() ?>"><br>
            <label for="autor">Autor: </label>
            <input type="text" name="autor" required value="<?php echo $doc[0]->getUsername() ?>"><br>

            <label for="categoria">Categoria: </label>
            <select for="categoria" name="categoria">            
                <option value="desporto">Desporto</option>
                <option value="musica">Musica</option>
                <option value="politica">Politica</option>
                <option value="filmes">Filmes</option>
            </select><br>

            <label for="palavras">Palavras Chave:</label>
            <input type="text" name="palavras" required value="<?php echo $doc[0]->getPalavrasChave() ?>"><br><br>
            <label>Estado do Documento</label>
            <br><input type="radio" name="tipo" checked="true" value="1"> Privado<br>
            <input type="radio" name="tipo" value="2"> Publico<br>
            <input type="radio" name="tipo" value="3"> Partilhado
            <br>
            <table   id="partilhar">
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
    </body>
</html>
