


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>

<?php include 'templates/header.php'; ?>

  <main class="container auth-page">
    <h1>Entrar</h1>
    <p>Acesse sua conta para acompanhar seus projetos e atividades.</p>

    <form action="usuario.php" method="post" class="auth-form">
      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="voce@email.com" required>

      <label for="senha">Senha</label>
      <input type="password" id="senha" name="senha" placeholder="Sua senha" required>

      <button type="submit" class="btn primary">Entrar</button>
      <p class="muted">Não tem conta? <a href="cadastro_usuario.php" class="btn">Crie uma agora</a>
    </form>
  </main>

<?php include 'templates/footer.php'; ?>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
