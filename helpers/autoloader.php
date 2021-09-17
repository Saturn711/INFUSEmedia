<?php
spl_autoload_register(function(string $className)
{
    $filepath = str_replace("\\", "/", $className);
    require_once $filepath.".php";
});