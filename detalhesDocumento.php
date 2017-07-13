<?php
session_start();

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

require_once Config::getApplicationManagerPath() . 'ComentarioManager.php';

$idDoc = filter_input(INPUT_GET, 'id');

$dManager = new DocumentoManager();

$doc = $dManager->getDocById($idDoc);

if ($doc[0]->getEstado() == 1) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost:1234/PawGrupo30/index.php">';
} else {
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
                <td><?php echo $value->getComentario() ?></td>
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
    <a href="index.php"><button type="button">Retroceder</button></a>
    <a href="download.php?id=<?php echo $idDoc ?>"><button type="button">Download</button></a>
    <a href="lerConteudo.php?id=<?php echo $idDoc ?>"><button type="button">Ler</button></a>
    <?php
}


