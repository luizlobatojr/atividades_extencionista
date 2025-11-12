<?php
include('conexao.php');

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nome = trim($_POST['nome']);
  $email = trim($_POST['email']);
  $senha = $_POST['senha'];
  $confirmar = $_POST['confirmar'];

  // Verificações básicas
  if ($senha !== $confirmar) {
    $mensagem = "❌ As senhas não coincidem!";
  } else {
    // Verifica se o e-mail já existe
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
      $mensagem = "⚠️ Este e-mail já está cadastrado.";
    } else {
      // Criptografa a senha
      $hash = password_hash($senha, PASSWORD_DEFAULT);

      // Insere o usuário
      $stmt = $conn->prepare("INSERT INTO usuarios (usuario, senha) VALUES (?, ?)");
      $stmt->bind_param("ss", $email, $hash);

      if ($stmt->execute()) {
        $mensagem = "✅ Cadastro realizado com sucesso! <a href='login.php'>Clique aqui para entrar</a>.";
      } else {
        $mensagem = "❌ Erro ao cadastrar. Tente novamente.";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro de Usuário — Atividades Extensionistas</title>
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

  <main id="conteudo" class="container">
    <section class="head">
      <h2>Cadastro de Usuário</h2>
      <p class="sub">Crie sua conta para participar de projetos e acessar conteúdos exclusivos.</p>
    </section>

    <form action="cadastro.php" method="post" class="form-grid">
      <div>
        <label for="nome">Nome completo</label>
        <input id="nome" name="nome" required placeholder="Seu nome" />
      </div>
      <div>
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" required placeholder="voce@email.com" />
      </div>
      <div>
        <label for="senha">Senha</label>
        <input id="senha" name="senha" type="password" required placeholder="Crie uma senha segura" />
      </div>
      <div>
        <label for="confirmar">Confirmar senha</label>
        <input id="confirmar" name="confirmar" type="password" required placeholder="Repita a senha" />
      </div>
      <button type="submit" class="btn primary">Cadastrar</button>
    </form>

    <?php if (!empty($mensagem)) { ?>
      <p style="margin-top:15px; color:#d00; font-weight:bold;">
        <?= $mensagem ?>
      </p>
    <?php } ?>
  </main>

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