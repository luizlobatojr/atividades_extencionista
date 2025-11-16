<?php
// Inicialização comum: cookies de sessão seguros, headers (quando possível) e CSRF

// Segurança: headers somente se ainda não foram enviados
if (!headers_sent()) {
    header("X-Frame-Options: SAMEORIGIN");
    header("X-Content-Type-Options: nosniff");
    header("Referrer-Policy: no-referrer-when-downgrade");
    header("Permissions-Policy: geolocation=()" );
    // CSP básico (ajuste conforme recursos externos utilizados)
    header("Content-Security-Policy: default-src 'self'; script-src 'self' https://cdn-uicons.flaticon.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;");
}

// Configura cookies de sessão antes de iniciar sessão
$secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => $secure,
    'httponly' => true,
    'samesite' => 'Lax'
]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gera token CSRF por sessão
if (!isset($_SESSION['csrf_token'])) {
    try {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    } catch (Exception $e) {
        // Fallback simples
        $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
    }
}

// Pequena função auxiliar para validação CSRF (retorna bool)
function validate_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], (string) $token);
}

?>
