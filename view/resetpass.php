<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../view/PHPMailer/PHPMailer.php';
require '../view/PHPMailer/SMTP.php';
require '../view/PHPMailer/Exception.php';
include_once "../model/userlist.php";
include_once "../controller/userlistC.php";

// Check if form is submitted


   
    $email = $_GET['email'];
    $userC= new userlistC(); 
    $user = $userC->findUserByemail($email);



$verification_pass = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

$mail = new PHPMailer(true);

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = "localhost";
    $mail->Port = 1025;

    $mail->CharSet = "utf-8";

    $mail->addAddress($email);
    $mail->setFrom("Dhia.Behi@Admin.tn");

    $mail->isHTML();

    $mail->Subject = 'Password verification code';
    $mail->Body    = '<p>Your PassWord verification code is: <b style="font-size: 30px;">' . $verification_pass . '</b></p>';
    
    $sql = "UPDATE userlist SET verif_pass = '$verification_pass' WHERE email = '" . $email . "'";
    $db = config::getConnexion();
    $query = $db->prepare($sql);
    $query->execute();
    $mail->send();
    header("Location: setcodepass.php?email=$email");

   
} catch (Exception $e) {
    echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
}

?>