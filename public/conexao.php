<?php

// Verifica se mysqli está habilitado
if (!class_exists('mysqli')) {
    die("Erro: a extensão mysqli não está habilitada no PHP.");
}

// Credenciais do banco (pode usar variáveis de ambiente)
$host = getenv('DB_HOST') ?: '127.0.0.1';
$db   = getenv('DB_NAME') ?: 'extensao';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';

// Tenta criar a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Checa conexão
if ($conn->connect_error) {
    error_log('Erro de conexão com o DB: ' . $conn->connect_error);
    die('Falha ao conectar com o banco de dados.');
}
