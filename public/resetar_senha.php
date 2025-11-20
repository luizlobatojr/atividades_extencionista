<?php
require __DIR__ . '/conexao.php';

$token = $_GET['token'] ?? '';

if (!$token) {
    die("Token inválido.");
}

$stmt = $conn->prepare("
    SELECT email 
    FROM tokens_reset 
    WHERE token = ? 
    AND expiracao > NOW()
");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Token inválido ou expirado.");
}

$row = $result->fetch_assoc();
$email = $row['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nova Senha</title>
</head>
<body>

<h2>Redefinir Senha</h2>

<form action="salvar_nova_senha.php" method="POST">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

    <label>Nova Senha:</label><br>
    <input type="password" name="senha1" required><br><br>

    <label>Confirmar Senha:</label><br>
    <input type="password" name="senha2" required><br><br>

    <button type="submit">Salvar Senha</button>
</form>

</body>
</html>
