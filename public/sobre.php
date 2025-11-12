<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sobre - Atividades Extensionistas</title>
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
    <h1>O que são atividades extensionistas?</h1>
    <p>A extensão universitária integra ensino e pesquisa com as demandas da sociedade, promovendo ações educativas, culturais e tecnológicas que geram desenvolvimento humano e social.</p>

    <div class="grid cols-3">
      <article class="card"><h3>Objetivos</h3><p>Promover trocas de saberes e fortalecer vínculos com a comunidade.</p></article>
      <article class="card"><h3>Metodologia</h3><p>Planejamento colaborativo, execução em campo e avaliação de impacto.</p></article>
      <article class="card"><h3>Princípios</h3><p>Ética, inclusão, sustentabilidade e respeito às diversidades.</p></article>
    </div>
  </main>

  <footer>
    <div class="container footer-bottom">
      <small>© <span id="ano"></span> — Programa de Extensão</small>
    </div>
  </footer>
  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
