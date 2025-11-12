


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
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
      </nav>
    </div>
  </header>

  <main class="container auth-page">
    <h1>Entrar</h1>
    <p>Acesse sua conta para acompanhar seus projetos e atividades.</p>

    <form action="usuario.php" method="post" class="auth-form">
      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="voce@email.com" required>

      <label for="senha">Senha</label>
      <input type="password" id="senha" name="senha" placeholder="Sua senha" required>

      <button type="submit" class="btn primary">Entrar</button>
      <p class="muted">Não tem conta? <a href="cadastro.php">Crie uma agora</a>.</p>
    </form>
  </main>

  <footer>
    <div class="container footer-bottom">
      <small>© <span id="ano"></span> — Programa de Extensão</small>
    </div>
  </footer>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
