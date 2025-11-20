<?php
require __DIR__ . '/conexao.php';

$token = $_POST['token'] ?? '';
$senha1 = $_POST['senha1'] ?? '';
$senha2 = $_POST['senha2'] ?? '';

if (!$token) {
    die("Token inválido.");
}

if ($senha1 !== $senha2) {
    die("As senhas não coincidem.");
}

if (strlen($senha1) < 6) {
    die("A senha deve ter pelo menos 6 caracteres.");
}

// Verifica o token
$stmt = $conn->prepare("
    SELECT email 
    FROM tokens_reset 
    WHERE token = ? 
    AND expiracao > NOW()
");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Token inválido ou expirado.");
}

$email = $result->fetch_assoc()['email'];
$senha_hash = password_hash($senha1, PASSWORD_DEFAULT);

// Atualiza a senha
$stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
$stmt->bind_param("ss", $senha_hash, $email);
$stmt->execute();

// Apaga o token
$stmt = $conn->prepare("DELETE FROM tokens_reset WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();

echo "Senha redefinida com sucesso! Agora você pode fazer login.";
?>
