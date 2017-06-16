<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

require_once (Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Config::getApplicationModelPath() . 'Utilizador.php');

class userManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'utilizador';

    public function getUsers() {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME);
            $listaUsers = array();
            $i = 0;
            foreach ($lista as $value) {
                $listaUsers[$i] = Utilizador::convertArrayToObject($value);
                $i++;
            }
            return $listaUsers;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUsersByUser($user) {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME, Array('id' => $user));
            return utilizador::convertToObject($lista);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getUserByName($utilizador) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, Array('username' => $utilizador));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function exists_login($utilizador, $password) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, Array('username' => $utilizador, 'password' => $password));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function gettingUserServerState($state) {
        try {
            return $this->getRecords(self::SQL_TABLE_NAME, Array('estadoServer' => $state));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_user($utilizador) {
        try {
            return $this->delete(self::SQL_TABLE_NAME, Array('username' => $utilizador));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update_pass($user, $utilizador) {
        try {
            return $this->update(self::SQL_TABLE_NAME, Array(
                        'username' => $utilizador->getUsername(),
                        'password' => $utilizador->getPassword(),
                        'nome' => $utilizador->getNome(),
                        'contacto' => $utilizador->getContacto(),
                        'morada' => $utilizador->getMorada(),
                            ), Array('username' => $user));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function utilizadorExists($username) {
        $consulta = $this->getRecords(static::SQL_TABLE_NAME, array('username' => $username));
        if (empty($consulta)) {
            return false;
        } else {
            return true;
        }
    }

    public function registarUtilizador($id, $username, $nome, $morada, $contacto, $password, $tipo, $estadoServer) {

        $enc_password = sha1($password);

        $user = new Utilizador($id, $username, $nome, $morada, $contacto, $enc_password, $tipo, $estadoServer);

        try {
            $this->insert(static::SQL_TABLE_NAME, $user->convertObjectToArray());
        } catch (Exception $ex) {
            
        }
    }

}
