<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../view/PHPMailer/PHPMailer.php';
require '../view/PHPMailer/SMTP.php';
require '../view/PHPMailer/Exception.php';
include_once "../model/userlist.php";
include_once "../controller/userlistC.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $username =$_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $age= $_POST['age'];
}

$verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

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

    $mail->Subject = 'Email verification';
    $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
    
    $user1 =  new userlist($_POST['fullname'],$_POST['username'],$_POST['email'],$_POST['pass'],$_POST['age'],$verification_code,null);
    $r=new userlistC();
    $r->adduser($user1);
    $mail->send();
    header('Location:login.php');

   
} catch (Exception $e) {
    echo "Erreur lors de l'envoi : {$mail->ErrorInfo}";
}

?>