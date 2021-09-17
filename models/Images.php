<?php

namespace models;

use db\DbConnection;
use \DateTime;
use \PDO;

class Images
{

    private $_stmt;

    public function addImage($userId, $pageUrl)
    {

        $query = "INSERT INTO images (userId, pageUrl, dateTime, counter)
                  VALUES (:userId, :pageUrl, :dateTime, :counter)";

        $dateTime = new DateTime();

        $params = [
            ":userId"    => $userId,
            ":pageUrl"   => $pageUrl,
            ":dateTime"  => $dateTime->format("Y-m-d H-i-s"),
            ":counter"   => 1
        ];

        $this->_stmt = DbConnection::$db->prepare($query);
        $this->_stmt->execute($params);

        return DbConnection::$db->lastInsertId();
    }

    public function incrementImageCounter($userId, $pageUrl)
    {

        $query = "UPDATE images
                  SET counter = counter + 1
                  WHERE userId = :userId
                  AND pageUrl = :pageUrl";

        $params = [
            ":userId"  => $userId,
            ":pageUrl" => $pageUrl
        ];
        $this->_stmt = DbConnection::$db->prepare($query);
        $this->_stmt->execute($params);

    }

    public function checkImage($userId, $pageUrl)
    {

        $params = [
            ":userId"    => $userId,
            ":pageUrl" => $pageUrl
        ];

        $query = "SELECT id
                  FROM images
                  WHERE userId = :userId
                  AND pageUrl = :pageUrl
                  LIMIT 1";

        $this->_stmt = DbConnection::$db->prepare($query);
        $this->_stmt->execute($params);

        return $this->_stmt->fetch(PDO::FETCH_COLUMN);
    }

}