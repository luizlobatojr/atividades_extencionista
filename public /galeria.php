<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Galeria - Atividades Extensionistas</title>
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
    <h1>Galeria</h1>
    <p>Registros das ações no território.</p>
    <div class="gallery">
      <figure><img src="https://images.unsplash.com/photo-1555636222-cae831e670b1?q=80&w=1200&auto=format&fit=crop" alt=""><figcaption>Visita técnica ao CRAS do bairro.</figcaption></figure>
      <figure><img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1200&auto=format&fit=crop" alt=""><figcaption>Oficina de prototipagem rápida.</figcaption></figure>
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
