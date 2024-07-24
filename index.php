<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

$router = new Bramus\Router\Router();
$router->setNamespace('\App\Controllers');

require __DIR__ . '/routes.php';

$router->run();
