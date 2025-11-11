<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Projetos - Atividades Extensionistas</title>
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
    <h1>Projetos</h1>
    <p>Conheça iniciativas em andamento e concluídas.</p>

    <div class="grid cols-3">
      <!-- Exemplo de card -->
      <article class="card">
        <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=1200&auto=format&fit=crop" alt="Inclusão digital para idosos">
        <div class="p">
          <h3>Inclusão Digital para Idosos</h3>
          <p>Capacitação em uso de smartphones e serviços públicos digitais.</p>
        </div>
      </article>
      <!-- Adicione os outros cards aqui -->
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
