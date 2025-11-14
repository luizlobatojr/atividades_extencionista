<?php
// Inicia a sessão (caso precise verificar login)
session_start();

// CONFIGURAÇÃO DO BANCO DE DADOS
require_once 'conexao.php';

// Pega o ID do usuário logado
$usuario_id = $_SESSION['usuario_id'];  // ← ESTE É O TRECHO

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// --- VERIFICA SE O FORMULÁRIO FOI ENVIADO ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 1️⃣ Recebe os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $area = $_POST["area"];
    $objetivo = $_POST["objetivo"];
    $publico = $_POST["publico"];
    $local = $_POST["local"];
    $carga_horaria = $_POST["carga_horaria"];
    $data_inicio = $_POST["data_inicio"];
    $data_fim = $_POST["data_fim"];

    $nome_coord = $_POST["nome_coordenador"];
    $matricula_coord = $_POST["matricula_coordenador"];
    $email_coord = $_POST["email_coordenador"];
    $telefone_coord = $_POST["telefone_coordenador"];
    $curso_coord = $_POST["curso_coordenador"];

    $tipo_atividade = $_POST["tipo_atividade"];
    $modalidade = $_POST["modalidade"];

    // 2️⃣ Upload de arquivos (se houver)
    $diretorio = "uploads/";
    if (!is_dir($diretorio)) mkdir($diretorio, 0755, true);

    $projeto_arquivo = "";
    $cronograma = "";
    $termo = "";

    if (isset($_FILES["projeto_arquivo"]) && $_FILES["projeto_arquivo"]["error"] === 0) {
        $nome_arquivo = time() . "_" . basename($_FILES["projeto_arquivo"]["name"]);
        move_uploaded_file($_FILES["projeto_arquivo"]["tmp_name"], $diretorio . $nome_arquivo);
        $projeto_arquivo = $diretorio . $nome_arquivo;
    }

    if (isset($_FILES["cronograma"]) && $_FILES["cronograma"]["error"] === 0) {
        $nome_arquivo = time() . "_" . basename($_FILES["cronograma"]["name"]);
        move_uploaded_file($_FILES["cronograma"]["tmp_name"], $diretorio . $nome_arquivo);
        $cronograma = $diretorio . $nome_arquivo;
    }

    if (isset($_FILES["termo"]) && $_FILES["termo"]["error"] === 0) {
        $nome_arquivo = time() . "_" . basename($_FILES["termo"]["name"]);
        move_uploaded_file($_FILES["termo"]["tmp_name"], $diretorio . $nome_arquivo);
        $termo = $diretorio . $nome_arquivo;
    }

    // 3️⃣ Prepara o comando SQL
    $sql = "INSERT INTO projetos (
        usuario_id, titulo, descricao, area, objetivo, publico, local, carga_horaria,
        data_inicio, data_fim,
        nome_coordenador, matricula_coordenador, email_coordenador, telefone_coordenador, curso_coordenador,
        tipo_atividade, modalidade,
        projeto_arquivo, cronograma, termo
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "issssssissssssssssss",
        $titulo,
        $descricao,
        $area,
        $objetivo,
        $publico,
        $local,
        $carga_horaria,
        $data_inicio,
        $data_fim,
        $nome_coord,
        $matricula_coord,
        $email_coord,
        $telefone_coord,
        $curso_coord,
        $tipo_atividade,
        $modalidade,
        $projeto_arquivo,
        $cronograma,
        $termo
    );

    // 4️⃣ Executa e verifica resultado
    if ($stmt->execute()) {
        // Redireciona para a página de sucesso
        header("Location: sucesso_cadastro_projeto.php");
        exit(); // importante para parar a execução
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
