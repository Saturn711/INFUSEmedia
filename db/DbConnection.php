<?php
class DbConnection{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'name';
    private const DB_USER = 'user';
    private const DB_PASS = 'pass';

    public function __construct(){

        try{
            $dbh = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS);
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
            die();
        }

    }

}