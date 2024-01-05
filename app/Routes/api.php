<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"));

$router->namespace("App\Controllers");

$router->get('/', "Api:index", "api.index");

$router->dispatch();