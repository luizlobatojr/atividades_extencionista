<?php
// Logout: não incluir `protecao.php` aqui (pode redirecionar). Apenas encerra a sessão.
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
session_unset();
session_destroy();
header("Location: login.php");
exit;
