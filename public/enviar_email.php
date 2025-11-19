<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Composer PHPMailer
require 'conexao.php';             // Deve definir $conn = new mysqli(...)

// Verificar conexão
if ($conn->connect_errno) {
    die("Falha na conexão com MySQL: " . $conn->connect_error);
}

// --- CONFIGURAÇÃO DO SMTP PARA GMAIL ---
$smtpHost = 'smtp.gmail.com';
$smtpPort = 587;
$smtpSecure = 'tls';
$smtpUser = 'luizlobatojr@gmail.com';
$smtpPass = 'mfsg fnkz cnco hncr'; // Senha de aplicativo do Gmail

// --- BUSCAR USUÁRIOS ---
$result = $conn->query("SELECT nome, email FROM usuarios");

if (!$result || $result->num_rows == 0) {
    die("Nenhum usuário encontrado no banco de dados.");
}

// --- LOOP DE ENVIO ---
while ($row = $result->fetch_assoc()) {

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';

    try {
        // Configuração SMTP
        $mail->isSMTP();
        $mail->Host       = $smtpHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUser;
        $mail->Password   = $smtpPass;
        $mail->SMTPSecure = $smtpSecure;
        $mail->Port       = $smtpPort;

        // Remetente e destinatário
        $mail->setFrom($smtpUser, 'Seu Sistema');
        $mail->addAddress($row['email'], $row['nome']);

        // Gerar token seguro
        $token = bin2hex(random_bytes(16));
        $resetLink = "localhost:8080/redefinir_senha.php?token=$token";

        // Salvar token no banco
        $query = $conn->prepare("
            INSERT INTO tokens_reset (email, token, expiracao)
            VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))
        ");
        $query->bind_param("ss", $row['email'], $token);
        $query->execute();

        if ($query->error) {
            echo "<b>Erro MySQL:</b> " . $query->error . "<br>";
        }

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Redefinição de senha';
        $mail->Body    = "
            <p>Olá, {$row['nome']}!</p>
            <p>Clique no link abaixo para redefinir sua senha:</p>
            <p><a href='$resetLink'>$resetLink</a></p>
        ";
        $mail->AltBody = "Olá, {$row['nome']}! Acesse este link: $resetLink";

        // Enviar e-mail
        $mail->send();
        echo "✔ E-mail enviado para {$row['email']}<br>";
        file_put_contents('log_envio.txt', date('Y-m-d H:i:s') . " - Sucesso: {$row['email']}\n", FILE_APPEND);

    } catch (Exception $e) {
        echo "✖ Erro ao enviar para {$row['email']}: {$mail->ErrorInfo}<br>";
        file_put_contents('log_envio.txt', date('Y-m-d H:i:s') . " - Erro: {$row['email']} - {$mail->ErrorInfo}\n", FILE_APPEND);
    }
}

$conn->close();
echo "<br>Envio finalizado!";
?>
