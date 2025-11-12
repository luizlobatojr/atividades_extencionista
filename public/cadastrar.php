<?php
// Inclui o arquivo de conexão
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
