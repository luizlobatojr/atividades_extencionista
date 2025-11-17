<?php
// Inclui inicialização comum (sessão segura, CSRF, headers quando possível)
require_once __DIR__ . '/../includes/init.php';

// Define destino do link da marca com base na sessão
$pagina_destino = isset($_SESSION['usuario_id']) ? 'dashboard.php' : 'index.php';
?>

  <header>
    <div class="container nav">

      <a href="<?= $pagina_destino ?>" class="brand">
        <span class="logo">EX</span><span>Atividades Extensionistas</span>
      </a>
      <nav class="nav-links">
        <?php if (!isset($_SESSION['usuario_id'])): ?>
        <a href="cadastro_usuario.php">Inscreva-se</a>
        <a href="login.php">Login</a>
        <?php else: ?>
        <a href="perfil.php">Meu Perfil</a>
        <a href="logout.php">Sair</a>
        <?php endif; ?>
        <a href="sobre.php">Sobre</a>
        <a href="projetos.php">Projetos</a>
        <a href="noticias.php">Notícias & Eventos</a>
        <a href="galeria.php">Galeria</a>
        <a href="contato.php">Contato</a>
      </nav>
    </div>
  </header>