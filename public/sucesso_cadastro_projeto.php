<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro Efetuado</title>
    <link rel="stylesheet" href="css/original.css">
</head>
<body>
  
<?php include 'templates/header.php'; ?>

  <section>
    <div class="container">
      <h2>Cadastro efetuado com sucesso!</h2>
      <p>Você já pode <a href="meus_projetos.php" class="btn">ver projetos</a>.</p>
    
    </div>
  </section>
  
<?php include 'templates/footer.php'; ?>

  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
   
    
</body>
</html>