<?php
// Leia credenciais do ambiente quando possível (evita comitar segredos)
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'extensao';
$user = getenv('DB_USER') ?: 'root'; // seu usuário do MySQL
$pass = getenv('DB_PASS') ?: '';     // sua senha do MySQL

$conn = new mysqli($host, $user, $pass, $db);

// Checa conexão
if ($conn->connect_error) {
    // Log e mensagem genérica
    error_log('DB connection error: ' . $conn->connect_error);
    die('Erro de conexão com o banco de dados.');
}
?>