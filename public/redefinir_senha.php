<<?php
require 'conexao.php';

if (!isset($_GET['token']) || empty($_GET['token'])) {
    die("Token inválido.");
}

$token = $_GET['token'];

// Verifica token
$stmt = $conn->prepare("SELECT email, expiracao FROM tokens_reset WHERE token = ? AND expiracao > NOW()");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Token inválido ou expirado.");
}

$row = $result->fetch_assoc();
$email = $row['email'];
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';
    $confirma = $_POST['confirma'] ?? '';

    if (empty($senha) || empty($confirma)) {
        $erro = "Preencha todos os campos.";
    } elseif ($senha !== $confirma) {
        $erro = "As senhas não coincidem.";
    } elseif (strlen($senha) < 6) {
        $erro = "Senha deve ter pelo menos 6 caracteres.";
    } else {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
        $stmt->bind_param("ss", $hash, $email);

        if ($stmt->execute()) {
            // Remove token
            $stmt = $conn->prepare("DELETE FROM tokens_reset WHERE token = ?");
            $stmt->bind_param("s", $token);
            $stmt->execute();
            header("Location: /login?reset=success");
            exit;
        } else {
            $erro = "Erro ao atualizar senha. Tente novamente.";
            error_log($stmt->error);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="css/original.css">
</head>
<body>
<main class="container" style="padding-block: 80px; display: flex; justify-content: center; align-items: center;">
    <section style="max-width: 400px; width: 100%;">
        <div class="head">
            <h2>🔑 Redefinir Senha</h2>
        </div>

        <?php if(isset($erro)): ?>
            <p style="color:red;"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <form method="post" class="auth-form">
            <div class="row">
                <div style="grid-column: 1 / -1;">
                    <label for="senha">Nova Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite a nova senha" required>
                </div>
                <div style="grid-column: 1 / -1;">
                    <label for="confirma">Confirmar Senha</label>
                    <input type="password" id="confirma" name="confirma" placeholder="Confirme a nova senha" required>
                </div>
            </div>
            <button type="submit" class="btn primary" style="width: 100%; margin-top: 12px;">Redefinir Senha</button>
        </form>

        <p class="sub" style="margin-top: 20px; text-align: center;">
            Lembrou sua senha? <a href="/login" class="btn">Faça login</a>
        </p>
    </section>
</main>
</body>
</html>
