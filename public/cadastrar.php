<?php

require_once __DIR__ . '/../includes/init.php';
require_once 'mail_config.php';
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validação CSRF
    if (!validate_csrf_token($_POST['csrf_token'] ?? '')) {
        die('Token CSRF inválido.');
    }

    $nome  = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Inserção usando prepared statement
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {

        // 🔹 Gera o token
        $token = bin2hex(random_bytes(32));

        // 🔹 Salva o token no banco
        $stmtToken = $conn->prepare("
            UPDATE usuarios 
            SET token_verificacao = ?, email_verificado = 0 
            WHERE email = ?
        ");
        $stmtToken->bind_param("ss", $token, $email);
        $stmtToken->execute();
        $stmtToken->close();

        // 🔹 Envia o email usando PHPMailer
        if (!enviarEmailConfirmacao($email, $nome, $token)) {
            error_log("Falha ao enviar email de confirmação.");
        }

        // 🔹 Redireciona
        header("Location: sucesso.php?email_enviado=1");
        exit();

    } else {
        error_log('Erro ao cadastrar usuário: ' . $stmt->error);
        echo "Erro ao cadastrar. Tente novamente mais tarde.";
    }

    $stmt->close();
}

$conn->close();
