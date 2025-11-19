<?php
require 'conexao.php';

if (!isset($_GET['token'])) {
    die("Token inválido.");
}

$token = $_GET['token'];

// Buscar token no banco
$stmt = $conn->prepare("SELECT email, expiracao FROM tokens_reset WHERE token = ? LIMIT 1");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    die("Token inválido ou expirado.");
}

$stmt->bind_result($email, $expiracao);
$stmt->fetch();

// Verificar expiração
if (strtotime($expiracao) < time()) {
    die("Este link expirou. Solicite uma nova redefinição.");
}
?>

<form method="POST" action="salvar_nova_senha.php">
    <h2>Redefinir Senha</h2>

    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="token" value="<?php echo $token; ?>">

    <label>Nova senha:</label><br>
    <input type="password" name="senha1" required><br><br>

    <label>Repita a senha:</label><br>
    <input type="password" name="senha2" required><br><br>

    <button type="submit">Salvar nova senha</button>
</form>
