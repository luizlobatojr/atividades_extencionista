<?php
// Helper para uploads: valida MIME, tamanho e sanitiza nome
function handle_upload_field(array $file, string $destDir, array $allowedMimes, int $maxBytes)
{
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'Nenhum arquivo enviado ou erro de upload.'];
    }

    if ($file['size'] > $maxBytes) {
        return ['success' => false, 'error' => 'Arquivo excede o tamanho máximo permitido.'];
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!in_array($mime, $allowedMimes, true)) {
        return ['success' => false, 'error' => 'Tipo de arquivo não permitido: ' . $mime];
    }

    // Sanitiza nome do arquivo
    $basename = preg_replace('/[^A-Za-z0-9_.-]/', '_', basename($file['name']));
    $filename = time() . '_' . uniqid() . '_' . $basename;

    if (!is_dir($destDir)) {
        if (!mkdir($destDir, 0755, true) && !is_dir($destDir)) {
            return ['success' => false, 'error' => 'Falha ao criar diretório de destino.'];
        }
    }

    $destination = rtrim($destDir, '/') . '/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return ['success' => false, 'error' => 'Falha ao mover o arquivo para destino.'];
    }

    return ['success' => true, 'path' => $destination];
}

?>
