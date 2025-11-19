<?php


require 'conexao.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_POST['email'])) {
    die("Email não enviado.");
}

$email = trim($_POST['email']);

// Verificar se existe usuário com esse e-mail
$stmt = $conn->prepare("SELECT nome FROM usuarios WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    die("Nenhum usuário cadastrado com esse e-mail.");
}

$stmt->bind_result($nome);
$stmt->fetch();

// Gerar token
$token = bin2hex(random_bytes(16));
$resetLink = "https://seusite.com/redefinir_senha.php?token=$token";

// Salvar token
$stmt2 = $conn->prepare("
    INSERT INTO tokens_reset (email, token, expiracao)
    VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))
");
$stmt2->bind_param("ss", $email, $token);
$stmt2->execute();

// Enviar e-mail
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'luizlobatojr@gmail.com';
    $mail->Password   = 'SUA_SENHA_DE_APP_AQUI';  // troque aqui!
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('luizlobatojr@gmail.com', 'Recuperação de Senha');
    $mail->addAddress($email, $nome);

    $mail->isHTML(true);
    $mail->Subject = 'Recuperar Senha';
    $mail->Body = "
        <p>Olá, $nome!</p>
        <p>Recebemos uma solicitação para redefinir sua senha.</p>
        <p>Clique no link abaixo:</p>
        <p><a href='$resetLink'>$resetLink</a></p>
        <p>O link expira em 1 hora.</p>
    ";

    $mail->send();
    echo "E-mail de recuperação enviado para <b>$email</b>.";

} catch (Exception $e) {
    echo "Erro ao enviar e-mail: " . $mail->ErrorInfo;
}
