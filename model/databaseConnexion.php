<?php
namespace Valarep\model;

use Valarep\View;
use \PDO;
use \PDOException;

class databaseConnexion
{
    private static $host = "127.0.0.1";
    private static $port = "3306";
    private static $database = "applicovid";
    private static $charset = "UTF8";
    private static $user = "root";
    private static $password = "";
    private static $connection;

    public static function open()
    {
        $dsn = "mysql:" .
            "host=" . self::$host . ";" .
            "port=" . self::$port . ";" .
            "dbname=" . self::$database . ";" .
            "charset=" . self::$charset . ";";

        try {
            self::$connection = new PDO($dsn, self::$user, self::$password);
            return self::$connection;
        } catch (PDOException $ex) {
            $code = "ABCD1234";

            View::setTemplate("fatal_error");

            View::bindVariable("title", "applicovid");
            View::bindVariable("code", $code);
            View::bindVariable("debugMode", false);
            View::bindVariable("ex", $ex);

            View::display();
            die();
        }

    }

    public static function close()
    {
        self::$connection = null;
    }
}