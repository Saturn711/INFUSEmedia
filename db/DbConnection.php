<?php

namespace db;

use \PDO;

class DbConnection
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'infusemedia';
    private const DB_USER = 'user';
    private const DB_PASS = 'UGD9g2d97gdfygu';

    public static $db;

    public static function getConnect()
    {
        try
        {
            self::$db = new PDO("mysql:host=".self::DB_HOST.";port=3307;dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS);
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
            die();
        }
    }

}