<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
      $_SESSION['usuario'] = $usuario['usuario'];
      header("Location: home.php");
      exit;
    } else {
      $erro = "Senha incorreta!";
    }
  } else {
    $erro = "Usuário não encontrado!";
  }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Entrar — Atividades Extensionistas</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/original.css">
</head>

<body>
  <a class="skip-link" href="#conteudo">Ir para o conteúdo principal</a>

  <!-- Header / Nav -->
  <input type="checkbox" id="nav-toggle" aria-hidden="true" />
  <header>

    <div class="container nav">
      <a href="index.html" class="brand" aria-label="Página inicial">
        <span class="logo" aria-hidden="true">EX</span>
        <span>Atividades Extensionistas</span>
      </a>

      <label for="nav-toggle" class="hamb" aria-label="Abrir menu">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M3 6h18v2H3zm0 5h18v2H3zm0 5h18v2H3z" />
        </svg>
      </label>

      <nav class="nav-links" aria-label="Principal">
        <a href="#sobre">Sobre</a>
        <a href="#projetos">Projetos</a>
        <a href="#noticias">Notícias & Eventos</a>
        <a href="#galeria">Galeria</a>
        <a href="#contato" class="btn" style="padding:8px 12px;">Contato</a>
        <div class="nav-auth">
          <a href="login.php" class="btn-login">Entrar</a>
          <a href="cadastro.php" class="btn-signup">Criar conta</a>
        </div>
      </nav>
    </div>
  </header>


  <main id="conteudo" class="auth-page">
    <div class="container auth-container">
      <h1>Entrar</h1>
      <p class="muted">Acesse sua conta para acompanhar projetos e inscrições.</p>

      <form action="login.php" method="post" class="auth-form">
        <div>
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" placeholder="voce@email.com" required>
        </div>
        <div>
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn primary">Entrar</button>
      </form>
      <?php if (isset($erro)) { ?>
        <p style="color: red; margin-top: 10px;"><?= $erro ?></p>
      <?php } ?>

      <p class="muted">Ainda não tem conta? <a href="cadastro.html">Cadastre-se</a></p>

      <footer>
        <div class="container footer-grid">
          <div>
            <strong>Atividades Extensionistas</strong>
            <p class="muted">Conhecimento aplicado para transformar realidades. Universidade, comunidade e parceiros
              caminhando juntos.</p>
          </div>
          <div>
            <strong>Mapa do site</strong>
            <ul class="footer-links">
              <li><a href="#sobre">Sobre</a></li>
              <li><a href="#projetos">Projetos</a></li>
              <li><a href="#noticias">Notícias & Eventos</a></li>
              <li><a href="#galeria">Galeria</a></li>
              <li><a href="#contato">Contato</a></li>
            </ul>
          </div>
          <div>
            <strong>Contato</strong>
            <p class="muted">Rua Exemplo, 123 – Centro<br />Sua Cidade – UF<br />+55 (00)
              0000-0000<br />contato@extensao.edu.br</p>
          </div>
          <div>
            <strong>Redes</strong>
            <ul class="footer-links">
              <li><a href="#">Instagram</a></li>
              <li><a href="#">YouTube</a></li>
              <li><a href="#">LinkedIn</a></li>
            </ul>
          </div>
        </div>
        <div class="container footer-bottom">
          <small class="muted">© <span id="ano">2025</span> — Programa de Extensão</small>
          <small class="muted">Desenvolvido por estudantes de Engenharia de Software</small>
        </div>
      </footer>
      <script>
        (() => {
          document.getElementById('ano').textContent = new Date().getFullYear()
        })();
      </script>

</body>

</html>