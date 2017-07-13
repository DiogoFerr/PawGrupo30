<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
<?php
session_start();

require_once __DIR__ . '/Config.php';

require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

$idDoc = $_GET["id"];

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
                <li><a href="detalhesDocumento.php?id=<?php echo $idDoc ?>">Detalhes</a></li>
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
                <li><a href="detalhesDocumento.php?id=<?php echo $idDoc ?>">Detalhes</a></li>
            </ul>
        </nav>


    <?php } ?>



    <h2><?php echo $doc[0]->getConteudo()
    ?></h2>
    <?php
}
    