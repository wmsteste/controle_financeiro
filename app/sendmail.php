<?php
function sendmail($email,$senha1){
 
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';
require_once 'src/Exception.php';
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true);
 
try {
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'wallacemartinssacramento@gmail.com';
  $mail->Password = '2245wallace3';
  $mail->Port = 587;
 
  $mail->setFrom($email);
  $mail->addAddress('endereco1@provedor.com.br');
  $mail->addAddress('endereco2@provedor.com.br');
 
  $mail->isHTML(true);
  $mail->Subject = 'Teste de email via gmail Canal TI';
  $mail->Body = 'Chegou o email teste do <strong>'.$senha1.'</strong>';
  $mail->AltBody = 'Chegou o email com sua senha para o controle financeiro compartilhado';
 
  if($mail->send()) {
    echo 'Email enviado com sucesso';
  } else {
    echo 'Email nao enviado';
  }
} catch (Exception $e) {
  echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
}
?>
