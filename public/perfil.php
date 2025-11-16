<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$nome = $_SESSION['usuario_nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil - Meu Site</title>
    <link rel="stylesheet" href="css/original.css" />
</head>

<body>

    <?php require 'templates/header.php'; ?>

    <section class="hero">
        <div class="container">
            <div>
                <div class="kicker">Perfil</div>
                <h2>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h2>
                <p class="lead">Acesse as opções abaixo para gerenciar suas atividades extensionistas.</p>
                <div class="cta">
                    <a href="#" class="btn primary">
                        <i class="fi fi-sr-folder"></i> Editar
                    </a>
                  
                    <a href="noticias.php" class="btn primary">
                        <i class="fi fi-ss-calendar"></i> Notícias & Eventos
                    </a>
                    <a href="dashboard.php" class="btn primary">
                        <i class="fi fi-sr-user"></i> Voltar ao Dashboard
                    </a>
                </div>

            </div>
            <div class="hero-card">
                <div class="stats">
                    <div class="stat">
                        <div class="n">5+</div>
                        <div class="t">Anos de experiência</div>
                    </div>
                    <div class="stat">
                        <div class="n">40+</div>
                        <div class="t">Projetos</div>
                    </div>
                    <div class="stat">
                        <div class="n">12</div>
                        <div class="t">Certificações</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php require 'templates/footer.php'; ?>

</body>

</html>