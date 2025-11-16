<?php
require_once __DIR__ . '/includes/init.php';

// Parâmetro ?file=nome.ext (relativo a uploads/)
$file = $_GET['file'] ?? '';
if (!$file) {
    http_response_code(400);
    exit('Arquivo não informado.');
}

$safe = basename($file); // evita traversal
$path = __DIR__ . '/uploads/' . $safe;

if (!file_exists($path)) {
    http_response_code(404);
    exit('Arquivo não encontrado.');
}

// Verifica autenticação mínima
if (!isset($_SESSION['usuario_id'])) {
    http_response_code(403);
    exit('Acesso negado.');
}

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($path);
header('Content-Description: File Transfer');
header('Content-Type: ' . $mime);
header('Content-Disposition: attachment; filename="' . basename($path) . '"');
header('Content-Length: ' . filesize($path));
readfile($path);
exit;
