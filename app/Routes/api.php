<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"));

$router->namespace("App\Controllers");

$router->post('/email', "Mail:sendEmail", "mail.sendemail");

$router->post('/upload', "Upload:sendFile", "upload.sendfile");

$router->dispatch();

if($router->error())  {
    echo json_encode("Não permitido", JSON_UNESCAPED_UNICODE);
}