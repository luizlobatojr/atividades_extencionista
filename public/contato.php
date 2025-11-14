<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contato - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>
  
<?php include 'templates/header.php'; ?>

  <main class="container">
    <h1>Fale com a equipe</h1>
    <p>Envie dúvidas, propostas de parceria ou peça informações sobre participação.</p>

    <form action="#" method="post">
      <label for="nome">Nome</label>
      <input id="nome" name="nome" required>

      <label for="email">E-mail</label>
      <input id="email" name="email" type="email" required>

      <label for="mensagem">Mensagem</label>
      <textarea id="mensagem" name="mensagem"></textarea>

      <p class="muted">* Este formulário é demonstrativo.</p>
      <button type="submit" class="btn primary">Enviar mensagem</button>
    </form>
  </main>

<?php include 'templates/footer.php'; ?>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
