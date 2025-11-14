<?php
// Inicia a sessão (guarded) — evita warnings caso o header já tenha iniciado a sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se não estiver logado, redireciona para o login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
