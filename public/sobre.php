<!DOCTYPE html> 
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sobre - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>

<?php include 'templates/header.php'; ?>

<main class="container">
  <!-- Espaço extra acima do h1 -->
  <h1 style="margin-top: 40px; margin-bottom: 16px; text-align: center;">
    O que são atividades extensionistas?
  </h1>
  
  <!-- Espaço extra abaixo do parágrafo e centralizado -->
  <p style="margin-bottom: 32px; text-align: center;">
    A extensão universitária integra ensino e pesquisa com as demandas da sociedade, 
    promovendo ações educativas, culturais e tecnológicas que geram desenvolvimento humano e social.
  </p>

  <div class="grid cols-3">
    <article class="card" style="text-align: center; padding: 24px;">
      <h3 style="margin-bottom: 12px;">Objetivos</h3>
      <p>Promover trocas de saberes e fortalecer vínculos com a comunidade.</p>
    </article>

    <article class="card" style="text-align: center; padding: 24px;">
      <h3 style="margin-bottom: 12px;">Metodologia</h3>
      <p>Planejamento colaborativo, execução em campo e avaliação de impacto.</p>
    </article>

    <article class="card" style="text-align: center; padding: 24px;">
      <h3 style="margin-bottom: 12px;">Princípios</h3>
      <p>Ética, inclusão, sustentabilidade e respeito às diversidades.</p>
    </article>
  </div>
</main>

<?php include 'templates/footer.php'; ?>

<script>
  document.getElementById("ano").textContent = new Date().getFullYear();
</script>
</body>
</html>
