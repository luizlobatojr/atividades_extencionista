<?php
// Inicialização comum (sessão segura, CSRF, headers)
require_once __DIR__ . '/includes/init.php';
// Helper de upload
require_once __DIR__ . '/includes/upload.php';

// CONFIGURAÇÃO DO BANCO DE DADOS
require_once 'conexao.php';

// Verifica autenticação e obtém o ID do usuário logado
if (!isset($_SESSION['usuario_id'])) {
    // Não autenticado — redireciona ao login
    header("Location: login.php");
    exit();
}
$usuario_id = (int) $_SESSION['usuario_id'];

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// --- VERIFICA SE O FORMULÁRIO FOI ENVIADO ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Validação CSRF
    if (!validate_csrf_token($_POST['csrf_token'] ?? '')) {
        die('Token CSRF inválido.');
    }

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

    // 2️⃣ Upload de arquivos (se houver) - usa helper
    $diretorio = __DIR__ . '/uploads';
    $allowedMimes = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];
    $maxBytes = 5 * 1024 * 1024; // 5MB

    $projeto_arquivo = "";
    $cronograma = "";
    $termo = "";

    if (isset($_FILES["projeto_arquivo"]) && $_FILES["projeto_arquivo"]["error"] === UPLOAD_ERR_OK) {
        $res = handle_upload_field($_FILES["projeto_arquivo"], $diretorio, $allowedMimes, $maxBytes);
        if ($res['success']) {
            // salvar caminho relativo para armazenamento no DB
            $projeto_arquivo = 'uploads/' . basename($res['path']);
        } else {
            die('Erro no upload do projeto: ' . $res['error']);
        }
    }

    if (isset($_FILES["cronograma"]) && $_FILES["cronograma"]["error"] === UPLOAD_ERR_OK) {
        $res = handle_upload_field($_FILES["cronograma"], $diretorio, $allowedMimes, $maxBytes);
        if ($res['success']) {
            $cronograma = 'uploads/' . basename($res['path']);
        } else {
            die('Erro no upload do cronograma: ' . $res['error']);
        }
    }

    if (isset($_FILES["termo"]) && $_FILES["termo"]["error"] === UPLOAD_ERR_OK) {
        $res = handle_upload_field($_FILES["termo"], $diretorio, $allowedMimes, $maxBytes);
        if ($res['success']) {
            $termo = 'uploads/' . basename($res['path']);
        } else {
            die('Erro no upload do termo: ' . $res['error']);
        }
    }

    // 3️⃣ Prepara o comando SQL
    $sql = "INSERT INTO projetos (
        usuario_id, titulo, descricao, area, objetivo, publico, local, carga_horaria,
        data_inicio, data_fim,
        nome_coordenador, matricula_coordenador, email_coordenador, telefone_coordenador, curso_coordenador,
        tipo_atividade, modalidade,
        projeto_arquivo, cronograma, termo
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Falha ao preparar statement: ' . $conn->error);
    }

    // Tipos: i (usuario_id), s (titulo), s (descricao), s (area), s (objetivo), s (publico), s (local),
    // i (carga_horaria), s (data_inicio), s (data_fim), e assim por diante (total 20 parâmetros)
    $carga_horaria = (int) $carga_horaria;

    $types = 'issssssissssssssssss';
    $stmt->bind_param(
        $types,
        $usuario_id,
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
