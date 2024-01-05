<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Mailer;

class Mail extends Controller {

    private $mail;

    public function sendEmail($data) {
        echo json_decode("E-mail Enviado");
        
        //$this->mail = new Mailer();      
        //$mail = filter_var($email, FILTER_VALIDATE_EMAIL );
        /*$this->mail->add(
            "Teste de Api de disparo de e-mails",
            "<h1>Enviado<h1/>",
            $name,
            $mail
        );

        if(!$this->mail->send()) {
            echo "Não enviado";
        }else {
            echo "Enviado";
        }*/
    }
}