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
<title>Painel do Usuário - Atividades Extensionistas</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    :root {
        --cor-primaria: #007BFF;
        --cor-secundaria: #f4f6f8;
        --texto: #333;
        --branco: #fff;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background-color: var(--cor-secundaria);
        color: var(--texto);
        display: flex;
        min-height: 100vh;
    }

    /* ===== Sidebar ===== */
    .sidebar {
        width: 250px;
        background-color: var(--branco);
        box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        position: fixed;
        top: 0;
        bottom: 0;
    }

    .sidebar h2 {
        text-align: center;
        padding: 20px 0;
        background-color: var(--cor-primaria);
        color: var(--branco);
        letter-spacing: 1px;
    }

    .sidebar a {
        padding: 15px 25px;
        text-decoration: none;
        color: #444;
        display: block;
        transition: background 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: var(--cor-primaria);
        color: var(--branco);
    }

    /* ===== Conteúdo principal ===== */
    .main-content {
        margin-left: 250px;
        padding: 30px;
        width: 100%;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    header h1 {
        font-size: 22px;
        font-weight: 600;
    }

    header .usuario {
        background-color: var(--branco);
        padding: 10px 20px;
        border-radius: 6px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    /* ===== Cards ===== */
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background-color: var(--branco);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        text-align: center;
    }

    .card h3 {
        margin-bottom: 10px;
        color: var(--cor-primaria);
    }

    .card p {
        font-size: 28px;
        font-weight: bold;
    }

    /* ===== Tabela ===== */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: var(--branco);
        border-radius: 10px;
        overflow: hidden;
    }

    table th, table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    table th {
        background-color: #f2f4f8;
        font-weight: 600;
    }

    table tr:hover {
        background-color: #f9fafc;
    }

    footer {
        text-align: center;
        margin-top: 40px;
        color: #777;
    }

    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            width: 200px;
        }
        .main-content {
            margin-left: 200px;
        }
    }
</style>
</head>
<body>
    <aside class="sidebar">
        <h2>EX - Extensão</h2>
        <a href="#" class="active">📊 Dashboard</a>
        <a href="projetos.php">📁 Meus Projetos</a>
        <a href="cadastro_projeto.php">📝 Novo Projeto</a>
        <a href="noticias.php">📰 Notícias & Eventos</a>
        <a href="perfil.php">👤 Meu Perfil</a>
        <a href="logout.php">🚪 Sair</a>
    </aside>

    <main class="main-content">
        <header>
            <h1>Painel de Controle</h1>
            <div class="usuario">👋 Bem-vindo, <strong><?php echo htmlspecialchars($nome); ?></strong></div>
        </header>

        <!-- Cards de resumo -->
        <div class="cards">
            <div class="card">
                <h3>Projetos Ativos</h3>
                <p>3</p>
            </div>
            <div class="card">
                <h3>Horas Extensionistas</h3>
                <p>120h</p>
            </div>
            <div class="card">
                <h3>Documentos Enviados</h3>
                <p>5</p>
            </div>
        </div>

        <!-- Lista de projetos -->
        <h3>Projetos Recentes</h3>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Área Temática</th>
                    <th>Status</th>
                    <th>Data de Início</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Educação Ambiental nas Escolas</td>
                    <td>Meio Ambiente</td>
                    <td><span style="color:green;">Aprovado</span></td>
                    <td>10/09/2025</td>
                    <td><a href="#">Ver detalhes</a></td>
                </tr>
                <tr>
                    <td>Oficinas de Robótica Social</td>
                    <td>Tecnologia</td>
                    <td><span style="color:orange;">Em análise</span></td>
                    <td>25/10/2025</td>
                    <td><a href="#">Ver detalhes</a></td>
                </tr>
                <tr>
                    <td>Saúde e Comunidade</td>
                    <td>Saúde</td>
                    <td><span style="color:red;">Reprovado</span></td>
                    <td>05/08/2025</td>
                    <td><a href="#">Ver detalhes</a></td>
                </tr>
            </tbody>
        </table>

        <footer>
            <p>© <span id="ano"></span> — Programa de Extensão DSARO</p>
        </footer>
    </main>

    <script>
        document.getElementById("ano").textContent = new Date().getFullYear();
    </script>
</body>
</html>
