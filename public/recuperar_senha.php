<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="css/original.css"> <!-- seu CSS -->
</head>

<body>
    <?php include 'templates/header.php'; ?>

    <main class="container" style="padding-block: 80px; display: flex; justify-content: center; align-items: center;">
        <section style="max-width: 400px; width: 100%;">
            <div class="head">
                <h2> 🔑 Recuperar Senha</h2>
            </div>
            <p class="sub">Insira o seu e-mail abaixo e enviaremos instruções para redefinir sua senha.</p>

            <form action="enviar_email.php" method="post" enctype="multipart/form-data" class="auth-form">
                <div class="row">
                    <div style="grid-column: 1 / -1;">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required>
                        <div class="erro" id="email-error"></div>
                    </div>
                </div>

                <button type="submit" class="btn primary" style="width: 100%; margin-top: 12px;">Enviar Instruções</button>
            </form>

            <p class="sub" style="margin-top: 20px; text-align: center;">
                Lembrou sua senha? <a href="/login" class="btn">Faça login</a>
            </p>
        </section>
    </main>

    <?php include 'templates/footer.php'; ?>
</body>

</html>