<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<?php
require_once __DIR__ . './Config.php';
require_once __DIR__ . './ValidarDocumento.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Criar Documento</title>
    </head>
    <img src="Application/Utilis/images/top.jpg" alt="topkek" id="imagemtop">
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
        <form method="post" enctype="multipart/form-data">
            <label for="categoria">Categoria: </label>
            <select for="categoria" name="categoria">            
                <option value="desporto">Desporto</option>
                <option value="musica">Musica</option>
                <option value="politica">Politica</option>
                <option value="filmes">Filmes</option>
            </select>
            <br>
            <label for="palavras">Palavras Chave:</label>
            <input type="text" name="palavras" id="palavras" required="true">
            <p><?php
                if (isset($errors['palavras'])) {
                    echo $errors['palavras'];
                }
                ?></p>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <input name="ficheiro" type="file" id="ficheiro">
            <p><?php
                if (isset($errors['ficheiro'])) {
                    echo $errors['ficheiro'];
                }
                ?></p>
            <input name="upload" type="submit" id="upload" value="upload">
        </form>
    </body>
</html>
