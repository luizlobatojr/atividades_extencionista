<form action="editar_perfil.php" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($usuario['telefone']) ?>">

    <label for="curso">Curso</label>
    <input type="text" name="curso" id="curso" value="<?= htmlspecialchars($usuario['curso']) ?>">

    <button type="submit" class="btn primary">Salvar Alterações</button>
</form>
