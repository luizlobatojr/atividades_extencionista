<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn-> real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    // Buscar usuario no Banco

    $stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();


    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nome, $hash);
        $stmt->fetch();

        // Verifica senha
        if (password_verify($senha, $hash)) {
            // Cria variáveis de sessão
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nome'] = $nome;

            // Redireciona para a página protegida
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }

    $stmt->close();
}

$conn->close();


?>
