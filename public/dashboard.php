<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
  header("Location: login.html");
  exit();
}

$nome = $_SESSION['usuario_nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Painel do Usuário</title>
  <link rel="stylesheet" href="css/original.css">
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>

</head>

<body>
  <header>
    <div class="container nav">
      <a href="index.php" class="brand">
        <span class="logo">EX</span><span>Atividades Extensionistas</span>
      </a>
      <nav class="nav-links">

        <a href="sobre.php">Sobre</a>
        <a href="projetos.php">Projetos</a>
        <a href="noticias.php">Notícias & Eventos</a>
        <a href="galeria.php">Galeria</a>
        <a href="contato.php" class="btn">Contato</a>
        <a href="logout.php" class="btn">Sair</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <div>
        <div class="kicker">Painel de Controle</div>
        <h2>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h2>
        <p class="lead">Acesse as opções abaixo para gerenciar suas atividades extensionistas.</p>
        <div class="cta">
          <a href="meus_projetos.php" class="btn primary">
            <i class="fi fi-sr-folder"></i> Meus Projetos
          </a>
          <a href="cadastro_projeto.php" class="btn primary">
            <i class="fi fi-sr-edit"></i> Cadastrar Projeto
          </a>
          <a href="noticias.php" class="btn primary">
            <i class="fi fi-ss-calendar"></i> Notícias & Eventos
          </a>
          <a href="perfil.php" class="btn primary">
            <i class="fi fi-sr-user"></i> Meu Perfil
          </a>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container footer-bottom">
      <small>© <span id="ano"></span> — Programa de Extensão</small>
    </div>
  </footer>
  <script>
    document.getElementById("ano").textContent = new Date().getFullYear();
  </script>
</body>

</html>