

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia sessão com cookies seguros
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => '',
    'secure' => false, // true se estiver usando HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Carrega variáveis de ambiente com phpdotenv
require_once __DIR__ . '/../vendor/autoload.php'; // se estiver usando vlucas/phpdotenv
$dotenv = Dotenv\Dotenv::createImmutable('/home/luizlobatojr/atividades_extencionista');
$dotenv->load();

// Pega as variáveis do .env ou fallback
$db_host = $_ENV['DB_HOST'] ?? '127.0.0.1';
$db_user = $_ENV['DB_USER'] ?? 'root';
$db_pass = $_ENV['DB_PASS'] ?? '';
$db_name = $_ENV['DB_NAME'] ?? 'extensao';

// Conecta ao banco de dados
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
$conn->set_charset("utf8"); // garante UTF-8

// Consulta projetos do mais recente para o mais antigo
$sql = "SELECT * FROM projetos ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Projetos - Atividades Extensionistas</title>
<link rel="stylesheet" href="css/original.css">
</head>
<body>

<?php include 'templates/header.php'; ?>

<main class="container">
<section>
    <div class="head">
        <div>
            <h2>Projetos</h2>
            <p class="sub">Conheça iniciativas em andamento e concluídas.</p>
        </div>
    </div>

    <div class="grid cols-3">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
        <article class="card">
            <?php
            $img = !empty($row['imagem']) ? $row['imagem'] : "https://images.unsplash.com/photo-1508780709619-79562169bc64?q=80&w=1200&auto=format&fit=crop";
            ?>
            <img src="<?= htmlspecialchars($img); ?>" alt="<?= htmlspecialchars($row['titulo']); ?>">

            <div class="p">
                <h3><?= htmlspecialchars($row['titulo']); ?></h3>
                <p class="muted"><?= nl2br(htmlspecialchars($row['descricao'])); ?></p>

                <div class="tags">
                    <span class="tag"><?= htmlspecialchars($row['area']); ?></span>
                    <span class="tag"><?= htmlspecialchars($row['modalidade']); ?></span>
                </div>

                <div class="spacer"></div>

                <div class="links">
                    <?php
                    $arquivos = ['projeto_arquivo' => 'Projeto', 'cronograma' => 'Cronograma', 'termo' => 'Termo'];
                    foreach ($arquivos as $campo => $label) {
                        if (!empty($row[$campo]) && file_exists($row[$campo])) {
                            echo '<a href="'.htmlspecialchars($row[$campo]).'" class="btn '.($label=='Projeto' ? 'primary' : 'ghost').'" target="_blank">'.htmlspecialchars($label).'</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </article>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Nenhum projeto cadastrado no momento.</p>
    <?php endif; ?>
    </div>
</section>
</main>

<?php include 'templates/footer.php'; ?>

<script>
document.getElementById("ano").textContent = new Date().getFullYear();
</script>

</body>
</html>

<?php $conn->close(); ?>
