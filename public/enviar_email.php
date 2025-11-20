<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/conexao.php';
require __DIR__ . '/mail_config.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagem = "Por favor, insira um e-mail válido.";
    } else {
        // Verifica se usuário existe
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $mensagem = "E-mail não encontrado.";
        } else {

            // remove tokens antigos
            $stmt = $conn->prepare("DELETE FROM tokens_reset WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // cria novo token
            $token = bin2hex(random_bytes(32));
            $stmt = $conn->prepare("INSERT INTO tokens_reset (email, token, expiracao) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
            $stmt->bind_param("ss", $email, $token);
            $stmt->execute();

            // envia email
            try {
                $mail = criarMailer();
                $mail->setFrom($_ENV['SMTP_USER'], 'Meu Site');
                $mail->addAddress($email);
                $mail->Subject = "Redefinir senha";

                // link automático
                $base_url = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
                $link = $base_url . "/resetar_senha.php?token=$token";

                $mail->Body = "Olá!\n\nClique no link abaixo para redefinir sua senha:\n$link\n\nO link é válido por 1 hora.";
                $mail->send();

                $mensagem = "E-mail enviado! Verifique sua caixa de entrada.";
            } catch (Exception $e) {
                error_log("Erro: " . $e->getMessage());
                $mensagem = "Erro ao enviar o e-mail.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Solicitar Redefinição de Senha</title>
    <link rel="stylesheet" href="css/original.css"> <!-- Seu CSS fornecido -->
</head>

<body>
    <?php include 'templates/header.php'; ?>

    <main class="container" style="padding-block: 80px; display: flex; justify-content: center; align-items: center;">
        <section style="max-width: 400px; width: 100%;">
            <div class="head">
                <h2> 🔑 Solicitar Redefinição de Senha</h2>
                <?php if ($mensagem) : ?>
                    <p class="<?php echo strpos($mensagem, 'erro') !== false ? 'erro' : ''; ?>" style="text-align:center;"><?php echo htmlspecialchars($mensagem); ?></p>
                <?php endif; ?>
            </div>
            <form action="enviar_email.php" method="post" enctype="multipart/form-data" class="auth-form">
                <div class="row">
                    <div style="grid-column: 1 / -1;">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
                        <div class="erro" id="email-error"></div>
                    </div>
                </div>
                <button type="submit" class="btn primary" style="margin-top:16px;">Enviar link</button>
            </form>
            </div>
            <p class="sub">Insira seu e-mail para receber um link de redefinição de senha.</p>

        </section>
    </main>


    <?php include 'templates/footer.php'; ?>


</body>


</html>