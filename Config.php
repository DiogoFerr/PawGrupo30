<?php

/**
 * Ficheiro de configuração
 *
 * @author ESTGF.PAW
 */
class Config {

    const IMAGES_FOLDER = '/Images/';
    const SGBD_HOST_NAME = 'localhost';
    const SGBD_DATABASE_NAME = 'paw';
    const SGBD_USERNAME = 'root';
    const SGBD_PASSWORD = '';
    const LOCALHOST = 'localhost:1234/PawGrupo30/';

    public static function getRelPath($path) {
        return explode("htdocs", $path)[1];
    }

    public static function getRootPath() {
        return realpath(dirname(__FILE__)) . "/";
    }

    public static function getImagesPathBase() {
        return realpath(dirname(__FILE__)) . '/Images/';
    }

    public static function getApplicationPath() {
        return realpath(dirname(__FILE__)) . '/Application/';
    }

    public static function getApplicationDatabasePath() {
        return self::getApplicationPath() . '/Database/';
    }

    public static function getApplicationManagerPath() {
        return self::getApplicationPath() . '/Manager/';
    }

    public static function getApplicationModelPath() {
        return self::getApplicationPath() . '/Model/';
    }

    public static function getApplicationUtilsPath() {
        return self::getApplicationPath() . '/Utils/';
    }

    public static function getApplicationJSPath() {
        return self::getApplicationUtilsPath() . '/JS/';
    }

    public static function getApplicationCSSPath() {
        return self::getApplicationUtilsPath() . '/CSS/';
    }

}
