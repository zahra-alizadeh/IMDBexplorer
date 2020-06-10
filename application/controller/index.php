<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'system/phpMailer/vendor/autoload.php';

$mail= new PHPMailer(true);
 try{
     $mail->SMTPOptions= array(
         'ssl'=> array(
             'verify_peer' => false,
             'verify_peer_name' => false,
             'allow_self_signed'=> true


         )
     );

     $mail->SMTPDebug= 2;
     $mail->isSMTP();
     $mail->Host="smtp.gmail.com";
     $mail->SMTPAuth= true;
     $mail->Username = "test@gmail.com";
     $mail->Password = "alaki";
     $mail->SMTPSecure = "tls";
     $mail->Port= 587;

     $mail->setFrom("test2@gmail.com", "zahra");
     $mail->addAddress("test3@gmail.com");
     $mail->isHTML(true);
     $mail->Subject = "Mailer Test";
     $mail->Body ="This is a Test";

     $mail->send();
     echo "ok";
 }
 catch (Exception $e){
     echo "no";
 }

?>