<?php
// Conexão com o banco
$mysqli = new mysqli("localhost", "usuario", "senha", "nome_do_banco");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);

    // Verifica se o usuário existe
    $result = $mysqli->query("SELECT id FROM users WHERE email='$email'");
    if ($result->num_rows === 0) {
        echo "E-mail não cadastrado.";
        exit;
    }

    $user = $result->fetch_assoc();

    // Gera token seguro
    $token = bin2hex(random_bytes(32));
    $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Salva token no banco
    $mysqli->query("UPDATE users SET reset_token='$token', token_expiry='$expiry' WHERE id={$user['id']}");

    // Envia e-mail
    $to = $email;
    $subject = "Redefinir Senha";
    $message = "
    <h2>Redefinir Senha</h2>
    <p>Clique no link abaixo para redefinir sua senha:</p>
    <a href='http://seusite.com/reset-password.php?token=$token'>Redefinir Senha</a>
    <p>Se você não solicitou, ignore este e-mail.</p>
    ";
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: MeuSite <no-reply@seusite.com>\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "E-mail enviado! Verifique sua caixa de entrada.";
    } else {
        echo "Erro ao enviar e-mail.";
    }
}
?>
