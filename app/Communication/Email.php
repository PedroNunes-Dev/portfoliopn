<?php

/**
     * Variáveis do fomulário
     */
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $result = '';

    /**
     * E-mails para quem será enviado os formulários
     */
    $address = "adm.pedronunes@gmail.com";
    $subject = "Contato pelo site";

    /**
     * Corpo do email
     */
    $body = "
    <html>
        <p>Nome: <b>$nome</b></p>
        <p>E-mail: <b>$email</b></p>
        <p>Telefone: <b>$telefone</b></p>
        <p>Mensagem: <b>$mensagem</b></p>
    </html>
    ";

    /**
     * Garantir que os caracteres sejam exibidos corretamente
     */
    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $nome <$email>";

    /**
     * Send
     */
    if (mail($address, $subject, $body, $headers)) {
        $result = 'E-mail enviado com sucesso!';
    }else{
        $result = 'E-mail não pode ser enviado!';
    }

    echo "<meta http-equiv='refresh' content='10;URL=/index.html'>";


?>












