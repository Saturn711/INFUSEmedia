<?php

namespace data;

use db\DbConnection;

class Application
{
    private $_users;

    public function __construct()
    {

        $this->_users = new Users();

        DbConnection::getConnect();
    }

    public function run($pageUrl)
    {

        $this->_users->updateUserImages($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], $pageUrl);

        echo Views::includeHtml($pageUrl);
    }

}