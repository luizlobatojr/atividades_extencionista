
<?php

require_once __DIR__ . '/../includes/init.php';
require_once __DIR__ . '/conexao.php';

$erro = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (!validate_csrf_token($_POST['csrf_token'])) {
        die("Token CSRF inválido!");
    }

    if (empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos.";
    } else {
        $stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $nome, $hash);
            $stmt->fetch();

            if (password_verify($senha, $hash)) {
                session_regenerate_id(true);
                $_SESSION['usuario_id'] = $id;
                $_SESSION['usuario_nome'] = $nome;
                header("Location: dashboard.php");
                exit();
            } else {
                $erro = "Senha incorreta!";
            }
        } else {
            $erro = "Usuário não encontrado!";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Login - Atividades Extensionistas</title>
<link rel="stylesheet" href="css/original.css">
</head>
<body>

<?php include 'templates/header.php'; ?>

<main class="container auth-page">
    <h1>Entrar</h1>
    <p>Acesse sua conta.</p>

    <?php if (!empty($erro)): ?>
        <div class="alert error"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form action="" method="post" class="auth-form">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit" class="btn primary">Entrar</button>
    </form>

    <div class="auth-links">
        <p class="muted">
            Não tem conta? <a href="cadastro_usuario.php" class="btn">Crie uma agora</a>
        </p>
        <p class="muted">
            Esqueceu sua senha? <a href="recuperar_senha.php" class="btn">Recupere aqui</a>
        </p>
    </div>
</main>

<?php include 'templates/footer.php'; ?>
<script>
document.getElementById("ano").textContent = new Date().getFullYear();
</script>
</body>
</html>
