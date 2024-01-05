<?php

namespace App\Core;

use Exception;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer {

    private $mail;
    private $data;
    private $error;

    public function __construct() {
        $this->mail = new PHPMailer();
        $this->data = new stdClass();

        $this->mail->isSMTP();
        $this->mail->isHTML();
        $this->mail->setLanguage("br");
        
        $this->mail->SMTPAuth = true;
        $this->mail->CharSet = "utf-8";
        
        $this->mail->Host = getenv("MAIL_HOST");
        $this->mail->Port = getenv("MAIL_PORT");
        $this->mail->SMTPSecure = getenv("MAIL_SECURITY");
        $this->mail->Username = getenv("MAIL_USER");
        $this->mail->Password = getenv("MAIL_PASSWORD");
    }

    public function add(string $subject, string $body, string $recipientName, string $recipientEmail): Mailer {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipientName = $recipientName;
        $this->data->recipientEmail = $recipientEmail;

        return $this;
    }

    public function send(string $fromName = MAIL['name'], string $fromEmail = MAIL['from']): bool {
        try{

            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body);
            $this->mail->addAddress($this->data->recipientEmail, $this->data->recipientEmail);
            $this->mail->setFrom($fromEmail, $fromName);

            $this->mail->send();
            return true;

        }catch(Exception $exeception) {
            $this->error = $exeception->getMessage();
            return false;
        }
    }

    public function error(): ?Exception {
        return $this->error();
    }

}