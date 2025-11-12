<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro Efetuado</title>
    <link rel="stylesheet" href="css/original.css">
</head>
<body>
    <header>
    <div class="container nav">
      <a href="index.php" class="brand">
        <span class="logo">EX</span><span>Atividades Extensionistas</span>
      </a>
      <nav class="nav-links">
        <a href="sobre.php">Sobre</a>
        <a href="projetos.php">Projetos</a>
        <a href="noticias.php">Notícias & Eventos</a>
        <a href="galeria.php">Galeria</a>
        <a href="contato.php" class="btn">Contato</a>
      </nav>
    </div>
  </header>
  <section>
    <div class="container">
      <h2>Cadastro efetuado com sucesso!</h2>
      <p>Você já pode <a href="login.php" class="btn">fazer login</a>.</p>
    
    </div>
  </section>
  <footer>
    <div class="container footer-bottom">
      <small>© <span id="ano"></span> — Programa de Extensão</small>
    </div>
  </footer>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
   
    
</body>
</html>