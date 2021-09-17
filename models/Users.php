<?php

namespace models;

use db\DbConnection;
use \PDO;

class Users
{

    private $_stmt;

    public function addUser($ip, $userAgent)
    {

        $query = "INSERT INTO users (ip, userAgent)
                  VALUES (:ip, :userAgent)";

        $params = [
            ":ip"        => $ip,
            ":userAgent" => $userAgent
        ];

        $this->_stmt = DbConnection::$db->prepare($query);
        $this->_stmt->execute($params);

        return DbConnection::$db->lastInsertId();
    }

    public function checkUser($ip, $userAgent)
    {

        $params = [
            ":ip"        => $ip,
            ":userAgent" => $userAgent
        ];

        $query = "SELECT users.id
                  FROM users
                  LEFT JOIN images
                  ON users.id = images.userId
                  WHERE ip = :ip
                  AND userAgent = :userAgent
                  LIMIT 1";

        $this->_stmt = DbConnection::$db->prepare($query);
        $this->_stmt->execute($params);

        return $this->_stmt->fetch(PDO::FETCH_COLUMN);
    }

}