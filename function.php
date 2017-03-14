<?php

$msg = '';

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                                      // Enable verbose debug output

    $mail->isSMTP();                                             // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                      // Enable SMTP authentication
    $mail->Username = 'user@example.com';                        // SMTP username
    $mail->Password = 'secret';                                  // SMTP password
    $mail->SMTPSecure = 'tls';                                   // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                           // TCP port to connect to

    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('example@example.com', 'example User');    // Add a recipient
    $mail->addAddress('example@example.com');                    // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    $mail->isHTML(true);                                         // Set email format to HTML

    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
        Email: {$_POST['email']}
        Name: {$_POST['name']}
        Message: {$_POST['message']}
EOT;
        header("Location: index.php");
        if (!$mail->send()) {
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
    header("Location: index.php");
}
