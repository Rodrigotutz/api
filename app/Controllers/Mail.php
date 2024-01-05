<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Mailer;

class Mail extends Controller {

    private $mail;

    public function sendEmail($email) {
        $this->mail = new Mailer();

        $mail = filter_var($email, FILTER_VALIDATE_EMAIL );

        $this->mail->add(
            "Teste de Api de disparo de e-mails",
            "<h1>Enviado<h1/>",
            "Maconheiro",
            $mail
        );

        if(!$this->mail->send()) {
            echo "Não enviado";
        }else {
            echo "Enviado";
        }
    }
}