<?php
require_once __DIR__ . '/Config.php';
require_once Config::getApplicationManagerPath() . 'DocumentoManager.php';

$errors = array();

$inputType = INPUT_GET;

if (filter_has_var($inputType, 'pesquisar')) {

    if (filter_has_var($inputType, 'pesquisa')) {
        $pesquisa = filter_input($inputType, 'pesquisa', FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS);
        if (!is_string($pesquisa) || strlen($pesquisa) < 6 || !preg_match("/^[a-zA-Z0-9]$/", $pesquisa)) {
            $erros['pesquisa'] = 'O pesquisa tem que ter pelo menos 6 ';
        }
    }
}
$campo = filter_input($inputType, 'campo');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultado da Pesquisa</title>
    </head>
    <body>
        <h1>Resultado da pesquisa</h1>
        <?php
        $dManager = new DocumentoManager();
        $doc = $dManager->pesquisarPublicos($pesquisa, $campo);
        foreach ($doc as $value) {
            ?>
            <fieldset>
                <h2><?php echo $value->getTitulo() ?> </h2>
                <p><?php echo $value->getResumo() ?></p>
                <p><?php echo $value->getUsername() ?></p>
                <a href="detalhesDocumento.php?id=<?php echo $value->getId() ?>">Mais...</a>
            </fieldset>
        <?php }
        ?>
        <a href="index.php"><button type="button">Voltar</button></a>
    </body>
</html>
