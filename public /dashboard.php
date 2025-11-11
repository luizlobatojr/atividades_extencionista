<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

$nome = $_SESSION['usuario_nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário</title>
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
        <a href="logout.php" class="btn">Sair</a>
      </nav>
    </div>
  </header>
  <section>
    <div class="container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($nome); ?>!</h2>
    <p>Você está logado.</p>
    
    </div>
    
  </section>

  <div class="container">
        <h2>Formulário de Cadastro - Atividades Extensionistas</h2>
        <form action="/submit_form" method="POST">
            
            <!-- Contato -->
            <h3>Contato</h3>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required pattern="\d{10,11}" title="Digite apenas números. Ex: 11987654321">

            <label for="endereco">Endereço:</label>
            <textarea id="endereco" name="endereco" rows="3" required></textarea>

            <!-- Dados Acadêmicos -->
            <h3>Dados Acadêmicos</h3>
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" required>

            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" required>

            <label for="periodo">Período:</label>
            <input type="number" id="periodo" name="periodo" min="1" max="20" required>

            <label for="turno">Turno:</label>
            <select id="turno" name="turno" required>
                <option value="">Selecione</option>
                <option value="manha">Manhã</option>
                <option value="tarde">Tarde</option>
                <option value="noite">Noite</option>
            </select>

            <!-- Informações da Atividade Extensionista -->
            <h3>Informações da Atividade Extensionista</h3>
            <label for="atividade">Nome da atividade:</label>
            <input type="text" id="atividade" name="atividade" required>

            <label for="descricao_atividade">Descrição da atividade:</label>
            <textarea id="descricao_atividade" name="descricao_atividade" rows="4" required></textarea>

            <label for="carga_horaria">Carga horária (em horas):</label>
            <input type="number" id="carga_horaria" name="carga_horaria" min="1" required>

            <label for="data_inicio">Data de início:</label>
            <input type="date" id="data_inicio" name="data_inicio" required>

            <label for="data_fim">Data de término:</label>
            <input type="date" id="data_fim" name="data_fim" required>

            <!-- Consentimentos -->
            <h3>Consentimentos</h3>
            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="termos" required>
                    Declaro que li e concordo com os termos e condições da atividade extensionista.
                </label>
                <label>
                    <input type="checkbox" name="dados" required>
                    Autorizo o uso dos meus dados pessoais para fins acadêmicos relacionados à atividade.
                </label>
            </div>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
    
    <footer>
    <div class="container footer-bottom">
      <small>© <span id="ano"></span> — Programa de Extensão</small>
    </div>
  </footer>
  <script>document.getElementById("ano").textContent = new Date().getFullYear();</script>
</body>
</html>
