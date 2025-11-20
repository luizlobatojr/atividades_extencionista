<?php
// Inclui inicialização comum (sessão segura, CSRF, headers quando possível)
require_once __DIR__ . '/../../includes/init.php';

// Define destino do link da marca com base na sessão
$pagina_destino = isset($_SESSION['usuario_id']) ? 'dashboard.php' : 'index.php';
?>

<header>
  <div class="nav container ">
    <a class="brand" href="<?= $pagina_destino ?>">
     
      <span class="logo">EX</span><span>Atividades Extensionistas</span>
    </a>
    
 <!-- Checkbox toggle para menu mobile -->
      <input type="checkbox" id="nav-toggle" class="nav-toggle" />


    <label for="nav-toggle" class="hamb">
      <svg viewBox="0 0 100 80" width="24" height="24">
        <rect width="100" height="10"></rect>
        <rect y="30" width="100" height="10"></rect>
        <rect y="60" width="100" height="10"></rect>
      </svg>
    </label>

    <!-- Coloque o nav IMEDIATAMENTE depois do checkbox -->
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