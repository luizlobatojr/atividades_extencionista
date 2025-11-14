<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Notícias & Eventos - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>
  
<?php include 'templates/header.php'; ?>

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

<?php include 'templates/footer.php'; ?>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
