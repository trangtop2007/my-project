<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/SMTP.php";

if ($send==true){
    $code=1999;
    $mail=new PHPMailer(true);


    $mail->isSMTP();  
    $mail->Host="smtp.gmail.com"; 
    $mail->SMTPAuth=true;  #xac thuc = true
    $mail->Username="trangtop2007@gmail.com";
    $mail->Password="rzlbxwmueamlrxpx";   
    $mail->SMTPSecure="ssl";  #dam bao du lieu duoc truyen len web
    $mail->Port=465;

    $mail->setFrom("trangtop2007@gmail.com");

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject="Mã xác thực của bạn là: ";

    $mail->Body="<h1 style='color:red'>$code</h1>";

    $mail->send();

}

?>