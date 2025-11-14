<?php include('protecao.php'); ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Área Restrita — Atividades Extensionistas</title>
    <link rel="stylesheet" href="css/original.css">
</head>

<body>
    <div class="container">
        <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        <p>Você acessou a área restrita do sistema.</p>

        <a href="logout.php" class="btn">Sair</a>
    </div>
</body>

</html>