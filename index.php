<?php
require_once __DIR__ . '/vendor/autoload.php';

\App\Wrappers\Env::parse(__DIR__ . '/.env');

$router = new Bramus\Router\Router();
$router->setNamespace('\App\Controllers');

require __DIR__ . '/routes.php';

$router->run();
