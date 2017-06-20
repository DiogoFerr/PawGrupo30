<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

require_once (Config::getApplicationDatabasePath() . 'MyDataAccessPDO.php');
require_once (Config::getApplicationModelPath() . 'Utilizador.php');

class userManager extends MyDataAccessPDO {

    const SQL_TABLE_NAME = 'utilizador';

    public function getUsers() {
        try {
            $lista = $this->getRecords(self::SQL_TABLE_NAME);
            return $lista;
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
            $result = $this->getRecords(self::SQL_TABLE_NAME, Array('username' => $utilizador));
            return $result;
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

    public function gettingUserServerState($username) {
        try {
            $lista = $this->getRecords(static::SQL_TABLE_NAME, Array('username' => $username));
            if (empty($lista)) {
                return;
            }
            $user = Utilizador::convertObjectToArray($lista[0]);
            return $user;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function delete_user($utilizador) {
        try {
            return $this->delete(self::SQL_TABLE_NAME, Array('username' => $utilizador));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update_state($id, $username, $nome, $morada, $contacto, $enc_password, $tipo, $estadoServer) {

        $user = new Utilizador($id, $username, $nome, $morada, $contacto, $enc_password, $tipo, $estadoServer);

        try {
            $this->update(static::SQL_TABLE_NAME, $user->convertObjectToArray(), Array('username' => $username));
        } catch (Exception $ex) {
            
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
