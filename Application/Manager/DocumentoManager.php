<link rel="stylesheet" href="Application/Utilis/css/newcss.css"/>
<?php
require_once __DIR__ . './../../Config.php';
require_once Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php';
require_once Config::getApplicationModelPath() . 'Documento.php';

class DocumentoManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'documento';

    public function registarDocumento($id, $nome, $tipo, $titulo, $autor, $resumo, $categoria, $data, $conteudo, $palavras, $tamanho, $estado, $username) {

        $documento = new Documento($id, $nome, $tipo, $titulo, $autor, $resumo, $categoria, $data, $conteudo, $palavras, $tamanho, $estado, $username);

        try {
            $this->insert(static::SQL_TABLE_NAME, $documento->convertObjectToArray());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDocById($id) {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME, Array('id' => $id));
            $listaDoc = array();
            $i = 0;
            foreach ($lista as $value) {
                $listaDoc[$i] = Documento::convertArrayToObject($value);
                $i++;
            }
            return $listaDoc;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPublicDocuments() {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME, Array('estado' => 2));
            $listaDoc = array();
            $i = 0;
            foreach ($lista as $value) {
                $listaDoc[$i] = Documento::convertArrayToObject($value);
                $i++;
            }
            return $listaDoc;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getMyDocuments($username) {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME, Array('username' => $username));
            $listaDoc = array();
            $i = 0;
            foreach ($lista as $value) {
                $listaDoc[$i] = Documento::convertArrayToObject($value);
                $i++;
            }
            return $listaDoc;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_doc($id) {
        try {
            return $this->delete(self::SQL_TABLE_NAME, Array('id' => $id));
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function updateDocumento($id, $nome, $tipo, $titulo, $autor, $resumo, $categoria, $data, $conteudo, $palavras, $tamanho, $estado, $username) {

        $documento = new Documento($id, $nome, $tipo, $titulo, $autor, $resumo, $categoria, $data, $conteudo, $palavras, $tamanho, $estado, $username);

        try {
            $this->update(static::SQL_TABLE_NAME, $documento->convertObjectToArray(), Array('id' => $id));
        } catch (Exception $ex) {
            
        }
    }

    public function ShowAll() {
        $manager = new DocumentoManager();
        $lista = $manager->getPublicDocuments();
        foreach ($lista as $value) {
            ?>
            <fieldset>
                <h2>Titulo: <?php echo $value->getTitulo() ?> </h2>
                <p>Resumo: <?php echo $value->getResumo() ?></p>
                <p>Autor: <?php echo $value->getAutor() ?></p>
                <a href="detalhesDocumento.php?id=<?php echo $value->getId() ?>">Mais...</a>
            </fieldset>
            <?php
        }
    }

    public function Showoutro() {
        $manager = new DocumentoManager();
        $lista = $manager->getPublicDocuments();
        foreach ($lista as $value) {
            if (!($value->getUsername() == $_SESSION['username'])) {
                ?>
                <fieldset>
                    <h2>Titulo: <?php echo $value->getTitulo() ?> </h2>
                    <p>Resumo: <?php echo $value->getResumo() ?></p>
                    <p>Autor: <?php echo $value->getAutor() ?></p>
                    <a href="detalhesDocumento.php?id=<?php echo $value->getId() ?>">Mais...</a>
                </fieldset>
                <?php
            }
        }
    }

}
