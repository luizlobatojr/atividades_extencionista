<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Atividades Extensionistas - Início</title>
  <link rel="stylesheet" href="css/original.css">
</head>

<body>

  <?php include 'templates/header.php'; ?>

  <section class="hero">
    <div class="container">
      <div>
        <div class="kicker">Universidade & Sociedade</div>
        <h1>Extensão que transforma realidades</h1>
        <p class="lead">Projetos de impacto social conduzidos por estudantes e docentes.</p>
        <div class="cta">
          <a href="projetos.php" class="btn primary">Ver projetos</a>
          <a href="cadastro.php" class="btn ghost">Inscreva-se</a>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <h2>Sobre o Programa</h2>
      <p>A extensão universitária integra ensino e pesquisa com as demandas da sociedade, promovendo ações educativas, culturais e tecnológicas.</p>
      <a href="sobre.php" class="btn">Saiba mais</a>
    </div>
  </section>

  <?php include 'templates/footer.php'; ?>

  <script>
    document.getElementById("ano").textContent = new Date().getFullYear();
  </script>
</body>

</html>