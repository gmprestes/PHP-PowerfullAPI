<?php

require 'PowerfulAPI.php';
require 'controllers/TestController.php';

$server = new PowerfulAPI('debug');

$server->addClass('TestController');
$server->handle();
?>
