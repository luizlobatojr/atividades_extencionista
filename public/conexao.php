<?php
require_once __DIR__ . '/../vendor/autoload.php'; // carregando php dotenv

// Carrega variáveis do .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Pegando variáveis do .env
$db_host = $_ENV['DB_HOST'] ?? '127.0.0.1';
$db_user = $_ENV['DB_USER'] ?? 'root';
$db_pass = $_ENV['DB_PASS'] ?? '';
$db_name = $_ENV['DB_NAME'] ?? 'extensao';

// Conecta ao banco de dados
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verifica se a conexão deu certo
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Configura charset UTF-8
$conn->set_charset("utf8");
?>