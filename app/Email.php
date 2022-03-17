<?php

namespace App;

require_once "../vendor/autoload.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug  = 0;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   ='email do gmail';
    $mail->Password   = 'senha do usuário';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->setLanguage('br');

    $mail->setFrom('adm.pedronunes@gmail.com', 'Contato pelo site'); //DE ONDE PARTE  O E-MAIL
    $mail->addAddress('adm.pedronunes@hotmail.com'); //QUEM VAI RECEBER O E-MAIL
    /* 
    $mail->addAddress('ellen@example.com');
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');
    */

    
    $mail->isHTML(true);
    $mail->Subject = 'Orçamento';
    $mail->Body    = "
        <html>
            <h2>Boa notícia</h2>
            <p>Alguém visitou seu site e deseja fazer um orçamento.</p>
            <h4>Segue dados do cliente:</h4>
            <p>Nome: <b>$nome</b></p>
            <p>E-mail: <b>$email</b></p>
            <p>Telefone: <b>$telefone</b></p>
            <p>Mensagem: <b>$mensagem</b></p>
        </html>
    ";

    if($mail->send()){
        echo "Mensagem enviada com sucesso!";
        echo "<meta http-equiv='refresh' content='5;URL=/index.html'>";
    }
    
}catch (Exception $e){ 
    echo "Mensagem não pode ser enviado! Mailer error,: {$mail->ErrorInfo}";
    echo "<meta http-equiv='refresh' content='5;URL=/index.html'>";
}

?>












