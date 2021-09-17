<?php

namespace data;

use models\Users as UsersModel;
use models\Images;

class Users
{

    private $_imagesModel;
    private $_usersModel;

    public function __construct()
    {
        $this->_imagesModel = new Images();
        $this->_usersModel = new UsersModel();
    }

    public function updateUserImages($ip, $userAgent, $pageUrl)
    {
        $userId = $this->_usersModel->checkUser($ip, $userAgent);

        var_dump($userId);

        if(!$userId)
        {
            $userId = $this->_usersModel->addUser($ip, $userAgent);

            if($userId > 0)
            {
                $this->_imagesModel->addImage($userId, $pageUrl);
            }
        }
        elseif($userId > 0)
        {
            $imageId = $this->_imagesModel->checkImage($userId, $pageUrl);

            if(!$imageId)
            {
                $this->_imagesModel->addImage($userId, $pageUrl);
            }
            else
            {
                $this->_imagesModel->incrementImageCounter($userId, $pageUrl);
            }
        }


    }
}