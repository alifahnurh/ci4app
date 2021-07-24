<?php

namespace App\Controllers;

use App\Models\MonitoringModel;
use App\Models\AuthModel;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends BaseController
{
    public function __construct()
    {
        $this-> MonitoringModel = new MonitoringModel();
        $this-> AuthModel = new AuthModel();
    }

   public function sendEmail()
   {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        $suhu = $this->request->getPost('suhu');
        $kelembapan = $this->request->getPost('kelembapan');
        $amonia = $this->request->getPost('amonia');
        $user = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '_mainaccount@simokaagroabadi.com' ;                     //SMTP username
            $mail->Password   = 'LulusPolines2021';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('simokaagroabadi@gmail.com');
            $mail->addAddress($email, $user);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('simokaagroabadi@gmail.com');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Notifikasi SIMOKA || Sistem Monitoring Kandang';
            // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($suhu >= 25.00) {
                $mail->send();
                $mail->Body    = 'Suhu <?= $suhu; ?> melebihi standar yaitu 27<sup>o</sup>C ';
            } else if ($kelembapan >= 70.00){
                $mail->send();
                $mail->Body    = 'Kelembapan <?= $kelembapan; ?> melebihi standar yaitu 70%';
            } else if ($amonia >= 0.50) {
                $mail->send();
                $mail->Body    = 'Kadar Gas Amonia <?= $amonia; ?> melebihi standar yaitu 0.2 <small>ppm</small> ';
            } else if ( $suhu >= 30.00 && $kelembapan && 70.00 && $amonia >= 0.50){
                $mail->send();
                $mail->Body    = 'Suhu <?= $suhu; ?> , Kelembapan <?= $kelambapan; ?> , Kadar Gas Amonia <?= $amonia; ?>  melebihi standar. Berikut adalah standar suhu, kelembapan, dan kadar gas amonia menurut penelitian : suhu = <?= $suhu; ?>, kelembapan = <?= $kelembapan; ?>, kadar gas amonia = <?= $amonia; ?>  ';
            } 

            // $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
   }
}
