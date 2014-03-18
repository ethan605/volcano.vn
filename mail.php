<?php
  require_once('mail/PHPMailerAutoload.php');
  require_once('data.php');

  define('GUSER', $smtp_username);
  define('GPWD', $smtp_password);
  define('TO_EMAIL', $contact_email);

  function smtpmailer($to, $from, $from_name, $subject, $body) {
    global $result;
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $result = 'Gởi mail bị lỗi: '.$mail->ErrorInfo;
        return false;
    } else {
        $result = 'Thư của bạn đã được gởi đi ';
        return true;
    }
  }

  smtpmailer(TO_EMAIL, $smtp_username, $_POST['name'], 'Volcano Vietnam - Contact', $_POST['email']." - ".$_POST['mess-contact']);

  header("Location: index.php");
  exit();
 ?>