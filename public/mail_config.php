<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function criarMailer(): PHPMailer
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host       = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['SMTP_USER'];
    $mail->Password   = $_ENV['SMTP_PASS'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // 🔥 ATIVA DEBUG AQUI
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $mail->Debugoutput = 'html';


    return $mail;
}

function enviarEmailConfirmacao($email, $nome, $token)
{
    try {
        $mail = criarMailer();
        $mail->setFrom($_ENV['SMTP_USER'], 'Seu Site');
        $mail->addAddress($email, $nome);

        $link = "http://localhost:8080/verificar.php?token=$token";

        $mail->Subject = "Confirme seu cadastro";
        $mail->Body    = "Olá $nome,\n\nClique no link para confirmar seu cadastro:\n$link\n\nObrigado!";

        return $mail->send();

    } catch (Exception $e) {
        error_log("Erro ao enviar email: " . $e->getMessage());
        return false;
    }
}


?>
