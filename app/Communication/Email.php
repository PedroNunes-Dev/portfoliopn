<?php

namespace App\Communication;

require_once "../../vendor/autoload.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Mailer = "smtp";

//Credenciais de acesso ao SMTP
//$mail->SMTPDebug = 1;
$mail->CharSet = 'UTF-8';
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->Username = "adm.pedronunes@gmail.com";
$mail->Password = "malupe281719";

//Remetente | Destinatários | Conteúdo do email
$mail->isHTML(true);
$mail->AddAddress("adm.pedronunes@hotmail.com");
$mail->SetFrom("adm.pedronunes@gmail.com",$nome);
//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Contato pelo Site";
$content = "<html>
                <p>Nome: <b>$nome</b></p>
                <p>E-mail: <b>$email</b></p>
                <p>Telefone: <b>$telefone</b></p>
                <p>Mensagem: <b>$mensagem</b></p>
            </html>
";

//Envio do e-mail
$mail->MsgHTML($content);

if(!$mail->send()){
    echo "Mensagem não pode ser enviado!";
    echo "<meta http-equiv='refresh' content='5;URL=/index.html'>";
}else{
    echo "Mensagem enviada com sucesso!";
    echo "<meta http-equiv='refresh' content='5;URL=/index.html'>";
}

?>












