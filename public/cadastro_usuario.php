<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Conta - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>
<?php include 'templates/header.php'; ?>

  <main class="container auth-page">
    <h1>Criar Conta</h1>
    <p>Cadastre-se para participar de projetos e receber novidades.</p>

    <form action="cadastrar.php" method="post" class="auth-form">
      <label for="nome">Nome completo</label>
      <input type="text" id="nome" name="nome" placeholder="Seu nome" required>

      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="voce@email.com" required>

      <label for="senha">Senha</label>
      <input type="password" id="senha" name="senha" placeholder="Crie uma senha" required>

      <label for="confirma">Confirmar senha</label>
      <input type="password" id="confirma" name="confirma" placeholder="Repita a senha" required>

      <button type="submit" class="btn primary">Cadastrar</button>
      <p class="muted">Já tem conta? <a href="login.php" class="btn">Entre aqui</a>
    </form>
  </main>

<?php include 'templates/footer.php'; ?>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
