<?php

namespace App\Core;

abstract class Controller {

    protected $router;

    public function __construct($router) {
        $this->router = $router;
    }
}