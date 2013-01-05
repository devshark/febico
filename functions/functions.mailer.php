<?php
require_once('classes/phpmailer/class.phpmailer.php');
    
    Class MailerSettings{
        static $USERNAME = 'ethicoders@gmail.com';
        static $PASSWORD = 'billonares';
        static $HOST = 'smtp.gmail.com';
        static $SETFROM = 'noreply@admission.plp.org';
        static $SETNAME = 'PLP Admission';
        static $ADMIN_EMAIL = 'ast.lim12@gmail.com';
    }
    
    function smtpmailer($to, $subject, $body, &$error) {
        $mailer = new PHPMailer();  // create a new object
        $mailer->IsSMTP(); // enable SMTP
        $mailer->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mailer->SMTPAuth = true;  // authentication enabled
        $mailer->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mailer->Host = MailerSettings::$HOST;
        $mailer->Port = 465; 
        $mailer->Username = MailerSettings::$USERNAME;
        $mailer->Password = MailerSettings::$PASSWORD;
        $mailer->SetFrom( MailerSettings::$SETFROM, MailerSettings::$SETNAME);
        $mailer->Subject = $subject;
        $mailer->Body = $body;
        $mailer->AddAddress($to);
        $error = null;
        if(!$mailer->Send()) {
            $error = $mailer->ErrorInfo;
            return false;
        } else {
            $error = 'Message sent to '.$to;
            return true;
        }
    }