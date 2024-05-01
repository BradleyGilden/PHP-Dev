<?php

require '../../vendor/autoload.php';
require_once('../basics/utils.php');

use App\SuperGlobal\Router;

// server super global
pprint($_SERVER);

$router = new Router();

$router->register(
    '/',
    function () {
        echo 'Home';
    }
);

$router->register(
    '/invoices',
    function () {
        echo 'Invoices';
    }
);

$router->resolve($_SERVER['REQUEST_URI']);
