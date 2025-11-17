<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];


$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$curso = $_POST['curso'] ?? '';

$sql = "UPDATE usuarios SET nome=?, email=?, telefone=?, curso=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nome, $email, $telefone, $curso, $usuario_id);
if ($stmt->execute()) {

    $_SESSION['usuario_nome'] = $nome;
    header("Location: editar_perfil.php?sucesso=1");
    exit();
} else {
    echo "Erro ao atualizar perfil: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
