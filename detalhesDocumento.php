<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
<?php
session_start();

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'ComentarioManager.php';

$idDoc = filter_input(INPUT_GET, 'id');

$dManager = new DocumentoManager();

$doc = $dManager->getDocById($idDoc);

if (!isset($_SESSION['username']) && $doc[0]->getEstado() == 1) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
} else {
    if (isset($_SESSION['username'])) {
        ?>
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
        <?php
    } else {
        ?>

        <nav>
            <form action="validarLogin.php" method="post">
                <label>Username:<input type="text" name="username" required></label>
                <label>Password:<input type="password" name="password" required></label>
                <input type="submit" name="loginbutton" value="Login">
                <a href="Registo.php"><button type="button">Registar</button></a>
            </form>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    <?php }
    ?>

    <h2>Titulo: <?php echo $doc[0]->getTitulo() ?></h2>
    <h2>Autor: <?php echo $doc[0]->getUsername() ?></h2>
    <h2>Resumo: <?php echo $doc[0]->getResumo() ?></h2>
    <h2>Categoria: <?php echo $doc[0]->getCategoria() ?></h2>
    <h2>Data de criação: <?php echo $doc[0]->getDataCriacao() ?></h2>
    <h2>Palavras Chave: <?php echo $doc[0]->getPalavrasChave() ?></h2>
    <table   id="partilhar">
        <tr>
            <th>Comentarios</th> 
        </tr>
        <?php
        $cManager = new ComentarioManager();
        $lista = $cManager->todosOsComentariosPorId($idDoc);
        foreach ($lista as $value) {
            ?>
            <tr>
                <td><?php echo $value->getUtilizador() ?> : </td>
                <td id="comment"><?php echo $value->getComentario() ?></td>
                <?php if (isset($_SESSION['username']) && $value->getUtilizador() == $_SESSION['username']) { ?>
                    <td><a href="apagarComentario.php?id=<?php echo $value->getId() ?>">Apagar</a></td>
                <?php } ?>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php if (isset($_SESSION['username'])) { ?>
        <form method="get" action="ValComentar.php" enctype="multipart/form-data">
            <label for="comentario"><?php echo $_SESSION['username']; ?>:</label>
            <input type="text" name="comentario" id="comentario" required="false">
            <input type="text" name="id"required="false" hidden="true" value="<?php echo $idDoc ?>">
            <input name="comentar" type="submit" id="comentar" value="comentar">
        </form>
    <?php } ?>
    <a href="download.php?id=<?php echo $idDoc ?>"><button type="button">Download</button></a>
    <a href="lerConteudo.php?id=<?php echo $idDoc ?>"><button type="button">Ler</button></a>
    <?php
}


