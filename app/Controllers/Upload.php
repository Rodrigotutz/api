<?php

namespace App\Controllers;

use App\Core\Controller;

class Upload extends Controller {

    private $file;
 
    public function sendFile($data) {
        echo json_decode("Arquivo Enviado");
    }
}