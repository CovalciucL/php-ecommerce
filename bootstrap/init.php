<?php

use App\Classes\Database;

if(!isset($_SESSION)) session_start();

require_once __DIR__. '/../app/config/_env.php';
new Database();


set_error_handler([new \App\Classes\ErrorHandler, 'handleErrors']);

require_once __DIR__.'/../app/Routes/routes.php';

new \App\Routes\RouteDispatcher($router);