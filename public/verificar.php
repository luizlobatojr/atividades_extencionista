<?php
require_once __DIR__ . '/../includes/init.php';
include 'conexao.php';

$mensagem = '';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Procura usuário com esse token
    $stmt = $conn->prepare("SELECT id, email_verificado FROM usuarios WHERE token_verificacao = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $email_verificado);
        $stmt->fetch();

        if ($email_verificado == 1) {
            $mensagem = "Seu e-mail já foi verificado anteriormente.";
        } else {
            // Atualiza para verificado e remove o token
            $stmtUpdate = $conn->prepare("UPDATE usuarios SET email_verificado = 1, token_verificacao = NULL WHERE id = ?");
            $stmtUpdate->bind_param("i", $id);
            $stmtUpdate->execute();
            $stmtUpdate->close();

            $mensagem = "Parabéns! Seu e-mail foi confirmado com sucesso.";
        }
    } else {
        $mensagem = "Token inválido ou expirado.";
    }

    $stmt->close();
} else {
    $mensagem = "Token não fornecido.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de E-mail</title>
    <link rel="stylesheet" href="css/original.css">
</head>
<body>
    <main class="container" style="padding: 80px; text-align:center;">
        <h1>Confirmação de E-mail</h1>
        <p><?= htmlspecialchars($mensagem) ?></p>
        <a href="login.php" class="btn primary">Ir para login</a>
    </main>
</body>
</html>
