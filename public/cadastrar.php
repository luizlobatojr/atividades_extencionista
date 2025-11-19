<?php


// Inclui inicialização e conexão
require_once __DIR__ . '/../includes/init.php';
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação CSRF
    if (!validate_csrf_token($_POST['csrf_token'] ?? '')) {
        die('Token CSRF inválido.');
    }

    $nome  = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Inserção usando prepared statement (mais seguro)
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        // Redireciona para a página de sucesso
        header("Location: sucesso.php");
        exit();
    } else {
        error_log('DB insert usuario error: ' . $stmt->error);
        echo 'Erro interno. Contate o administrador.';
    }

    $stmt->close();
}

$conn->close();
?>
