<?php

//spl_autoload_register(); // don't load our classes unless we use them

require 'PowerfulAPI.php';
require 'controllers/TestController.php';

$server = new PowerfulAPI('debug');

$server->addClass('TestController');
$server->handle();
?>
