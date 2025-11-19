<?php
require 'conexao.php';

if (!isset($_POST['email'], $_POST['token'], $_POST['senha1'], $_POST['senha2'])) {
    die("Dados incompletos.");
}

$email = $_POST['email'];
$token = $_POST['token'];
$senha1 = $_POST['senha1'];
$senha2 = $_POST['senha2'];

if ($senha1 !== $senha2) {
    die("As senhas não coincidem.");
}

// Hash seguro da senha
$senhaHash = password_hash($senha1, PASSWORD_DEFAULT);

// Atualizar senha no banco
$stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
$stmt->bind_param("ss", $senhaHash, $email);
$stmt->execute();

// Apagar token para não reutilizar
$stmt2 = $conn->prepare("DELETE FROM tokens_reset WHERE token = ?");
$stmt2->bind_param("s", $token);
$stmt2->execute();

echo "Senha redefinida com sucesso! Você já pode fazer login.";
