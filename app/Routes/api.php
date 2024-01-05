<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"));

$router->namespace("App\Controllers");

$router->get('/', "Api:index", "api.index");

$router->post('/email', "Mail:sendEmail", "mail.sendemail");

$router->post('/upload', "Upload:sendFile", "upload.sendfile");

$router->dispatch();

if($router->error())  {
    echo json_encode("Não encontrado", JSON_UNESCAPED_UNICODE);
}