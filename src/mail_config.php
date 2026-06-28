<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

function sendOTP($toEmail, $otp){

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'pavanavula2005@gmail.com';

        $mail->Password = 'upyt ywua wcmy tisd';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port = 587;

        $mail->setFrom('YOUR_GMAIL@gmail.com', 'Smart BookStore');

        $mail->addAddress($toEmail);

        $mail->isHTML(true);

        $mail->Subject = 'Email Verification OTP';

        $mail->Body = "
        <h2>Smart BookStore</h2>

        <p>Your OTP is:</p>

        <h1>$otp</h1>

        <p>This OTP is valid for 10 minutes.</p>
        ";

        $mail->send();

        return true;

    }catch(Exception $e){

        return false;

    }

}
?>