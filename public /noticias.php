<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Notícias & Eventos - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>
  <header>
    <div class="container nav">
      <a href="index.php" class="brand"><span class="logo">EX</span><span>Atividades Extensionistas</span></a>
      <nav class="nav-links">
        <a href="sobre.php">Sobre</a>
        <a href="projetos.php">Projetos</a>
        <a href="noticias.php">Notícias & Eventos</a>
        <a href="galeria.php">Galeria</a>
        <a href="contato.php" class="btn">Contato</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <h1>Notícias & Eventos</h1>
    <article class="news-item">
      <time datetime="2025-08-14">14 ago 2025</time>
      <h3>Resultado do Edital de Bolsas de Extensão</h3>
      <p>Foram contemplados 12 projetos em diferentes áreas.</p>
    </article>
    <article class="news-item">
      <time datetime="2025-07-30">30 jul 2025</time>
      <h3>Seminário de Boas Práticas Extensionistas</h3>
      <p>Evento aberto com apresentação de resultados e mesas temáticas.</p>
    </article>
  </main>

  <footer>
    <div class="container footer-bottom">
      <small>© <span id="ano"></span> — Programa de Extensão</small>
    </div>
  </footer>
  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
