<?php
session_start();
require_once 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$msg = "";

// Buscar dados atuais do usuário
$stmt = $conn->prepare("SELECT nome, email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->bind_result($nome, $email);
$stmt->fetch();
$stmt->close();

// Atualizar dados se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo_nome = $_POST['nome'];
    $novo_email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $novo_nome, $novo_email, $usuario_id);

    if ($stmt->execute()) {
        $msg = "Perfil atualizado com sucesso!";
        $nome = $novo_nome;
        $email = $novo_email;
    } else {
        $msg = "Erro ao atualizar perfil: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/original.css" />
    <style>
        main.container {
            max-width: 600px;
            margin: 40px auto;
        }
        h2 {
            margin-bottom: 25px;
        }
        .auth-form label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .auth-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .auth-form button {
            margin-top: 15px;
            padding: 10px 20px;
        }
        .msg {
            margin-bottom: 15px;
            color: green;
        }
    </style>
</head>
<body>

<?php require 'templates/header.php'; ?>

<main class="container">
    <h2>Editar Perfil</h2>

    <?php if (!empty($msg)): ?>
        <p class="msg"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>

    <form method="post" class="auth-form">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>

        <button type="submit" class="btn primary">Salvar Alterações</button>
    </form>
</main>

<?php require 'templates/footer.php'; ?>

</body>
</html>
