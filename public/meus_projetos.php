<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once 'conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
  header("Location: login.php");
  exit();
}

$usuario_id = $_SESSION['usuario_id'];

// Busca apenas os projetos do usuário logado
$sql = "SELECT * FROM projetos WHERE usuario_id = ? ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Meus Projetos - Atividades Extensionistas</title>
  <link rel="stylesheet" href="css/original.css">
</head>
<body>

<?php include 'templates/header.php'; ?>

<main class="container">
  <section>
    <div class="head">
      <div>
        <h2>Meus Projetos</h2>
        <p class="sub">Aqui estão os projetos que você cadastrou.</p>
      </div>
      <a href="cadastro_projeto.php" class="btn primary">+ Novo Projeto</a>
    </div>

    <div class="grid cols-3">
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <article class="card">
            <?php
              $img = "https://images.unsplash.com/photo-1508780709619-79562169bc64?q=80&w=1200&auto=format&fit=crop";
            ?>
            <img src="<?= $img ?>" alt="<?= htmlspecialchars($row['titulo']); ?>">

            <div class="p">
              <h3><?= htmlspecialchars($row['titulo']); ?></h3>
              <p class="muted"><?= nl2br(htmlspecialchars($row['descricao'])); ?></p>

              <div class="tags">
                <span class="tag"><?= htmlspecialchars($row['area']); ?></span>
                <span class="tag"><?= htmlspecialchars($row['modalidade']); ?></span>
              </div>

              <div class="spacer"></div>

              <div class="links">
                <?php if (!empty($row['projeto_arquivo'])): ?>
                  <a href="<?= $row['projeto_arquivo']; ?>" class="btn ghost" target="_blank">Projeto</a>
                <?php endif; ?>

                <?php if (!empty($row['cronograma'])): ?>
                  <a href="<?= $row['cronograma']; ?>" class="btn ghost" target="_blank">Cronograma</a>
                <?php endif; ?>

                <?php if (!empty($row['termo'])): ?>
                  <a href="<?= $row['termo']; ?>" class="btn ghost" target="_blank">Termo</a>
                <?php endif; ?>
              </div>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Nenhum projeto cadastrado ainda.</p>
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

<?php
$stmt->close();
$conn->close();
?>
