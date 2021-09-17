<?php

namespace data;

class Views
{
    private static $_layout;

    private const FILE_PATH = "views";

    public static function includeHtml($file)
    {
        if(file_exists(self::FILE_PATH."/".$file))
        {
            self::$_layout = include_once self::FILE_PATH."/".$file;

            return self::$_layout;
        }
    }
}