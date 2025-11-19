<?php
require 'conexao.php';
require 'mail_config.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    
    if (empty($email)) {
        $mensagem = "Preencha seu e-mail.";
    } else {
        // Verifica se usuário existe
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            $mensagem = "E-mail não encontrado.";
        } else {
            $token = bin2hex(random_bytes(32));
            $stmt = $conn->prepare("INSERT INTO tokens_reset (email, token, expiracao) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
            $stmt->bind_param("ss", $email, $token);
            $stmt->execute();
            $stmt->close();

            // Enviar e-mail
            $mail = criarMailer();
            $mail->setFrom($_ENV['SMTP_USER'], 'Meu Site');
            $mail->addAddress($email);
            $mail->Subject = 'Redefinir senha';
            $link = "https://seusite.com/reset_senha.php?token=$token";
            $mail->Body = "Olá!\n\nClique no link abaixo para redefinir sua senha (válido por 1 hora):\n$link";

            if ($mail->send()) {
                $mensagem = "E-mail de redefinição enviado!";
            } else {
                $mensagem = "Erro ao enviar e-mail. Tente novamente.";
                error_log($mail->ErrorInfo);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Solicitar Redefinição de Senha</title>
</head>
<body>
<h2>Solicitar Redefinição de Senha</h2>
<?php if ($mensagem) echo "<p>$mensagem</p>"; ?>
<form method="post">
    <label>E-mail:</label>
    <input type="email" name="email" required>
    <button type="submit">Enviar link</button>
</form>
</body>
</html>
