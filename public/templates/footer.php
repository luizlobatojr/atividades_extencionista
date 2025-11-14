<footer>
    <div class="container footer-grid">
        <div>
            <strong>Atividades Extensionistas</strong>
            <p class="muted">Conhecimento aplicado para transformar realidades. Universidade, comunidade e parceiros caminhando juntos.</p>
        </div>

        <div>
            <strong>Mapa do site</strong>
            <ul class="footer-links">
                <li><a href="cadastro.php">Inscreva-se</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="projetos.php">Projetos</a></li>
                <li><a href="noticias.php">Notícias & Eventos</a></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="contato.php">Contato</a></li>

            </ul>
        </div>

        <div>
            <strong>Contato</strong>
            <p class="muted">
                Rua Exemplo, 123 – Centro<br />
                Sua Cidade – UF<br />
                +55 (00) 0000-0000<br />
                <a href="mailto:contato@extensao.edu.br">contato@extensao.edu.br</a>
            </p>
        </div>

        <div>
            <strong>Redes</strong>
            <ul class="footer-links">
                <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
                <li><a href="https://www.youtube.com" target="_blank">YouTube</a></li>
                <li><a href="https://www.linkedin.com" target="_blank">LinkedIn</a></li>
            </ul>
        </div>
    </div>

    <div class="container footer-bottom">
        <small class="muted">© <span id="ano"></span> — Programa de Extensão</small>
        <small class="muted">Desenvolvido por estudantes de Engenharia de Software</small>
    </div>

    <script>
        // Atualiza o ano automaticamente
        document.getElementById("ano").textContent = new Date().getFullYear();
    </script>
</footer>