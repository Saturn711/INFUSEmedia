<?php
require_once "helpers/autoloader.php";

use data\Application;

$application = new Application();
$application->run(htmlentities(strip_tags($_GET['url'])));
