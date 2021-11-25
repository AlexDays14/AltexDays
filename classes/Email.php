<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $mensaje)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

    public function enviarFormContacto(){
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'mytasksdays@gmail.com';
        $mail->Password = 'Tommyrafa8@';

        $mail->setFrom('mytasksdays@gmail.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Hemos recibido tu mensaje';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has Enviado un mensaje por medio de nuestra página, el cual es:</p>";
        $contenido .= "<p>" . $this->mensaje . "</p>";
        $contenido .= "<p>Pronto nos pondremos en contacto contigo</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        $mail->send();
    }

    public function enviarFormContactoAdmin(){
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'mytasksdays@gmail.com';
        $mail->Password = 'Tommyrafa8@';

        $mail->setFrom('mytasksdays@gmail.com');
        $mail->addAddress('proferna8@hotmail.com');
        $mail->Subject = 'Te han Enviado un mensaje';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= "<p><strong>" . $this->nombre . "</strong> Ha contestado el form de contacto, no lo hagas esperar y atiéndelo.</p>";
        $contenido .= "<p>Este es su mensaje: </p>";
        $contenido .= "<p>". $this->mensaje ."</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;
        $resultado = $mail->send();

        return $resultado;
        //debuguear($mail);
    }
}