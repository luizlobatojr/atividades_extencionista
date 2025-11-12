<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Atividades Extensionistas - Início</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>
  <header>
    <div class="container nav">
      <a href="index.php" class="brand">
        <span class="logo">EX</span><span>Atividades Extensionistas</span>
      </a>
      <nav class="nav-links">
        <a href="cadastro.php">Inscreva se</a>
        <a href="login.php">login</a>
        <a href="sobre.php">Sobre</a>
        <a href="sobre.php">Sobre</a>
        <a href="projetos.php">Projetos</a>
        <a href="noticias.php">Notícias & Eventos</a>
        <a href="galeria.php">Galeria</a>
        <a href="contato.php" class="btn">Contato</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="container">
      <div>
        <div class="kicker">Universidade & Sociedade</div>
        <h1>Extensão que transforma realidades</h1>
        <p class="lead">Projetos de impacto social conduzidos por estudantes e docentes.</p>
        <div class="cta">
          <a href="projetos.html" class="btn primary">Ver projetos</a>
          <a href="contato.html" class="btn ghost">Inscreva-se</a>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <h2>Sobre o Programa</h2>
      <p>A extensão universitária integra ensino e pesquisa com as demandas da sociedade, promovendo ações educativas, culturais e tecnológicas.</p>
      <a href="sobre.html" class="btn">Saiba mais</a>
    </div>
  </section>

  <footer>
    <div class="container footer-bottom">
      <small>© <span id="ano"></span> — Programa de Extensão</small>
    </div>
  </footer>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
