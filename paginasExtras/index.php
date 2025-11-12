<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Atividades Extensionistas</title>
  <meta name="description"
    content="Portal de atividades extensionistas: projetos, notícias, eventos, galeria e contato." />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;800&family=Inter:wght@400;500;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/original.css">
</head>

<body>
  <a class="skip-link" href="#conteudo">Ir para o conteúdo principal</a>

  <!-- Header / Nav -->
  <input type="checkbox" id="nav-toggle" aria-hidden="true" />
  <header>

    <div class="container nav">
      <a href="index.html" class="brand" aria-label="Página inicial">
        <span class="logo" aria-hidden="true">EX</span>
        <span>Atividades Extensionistas</span>
      </a>

      <label for="nav-toggle" class="hamb" aria-label="Abrir menu">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path d="M3 6h18v2H3zm0 5h18v2H3zm0 5h18v2H3z" />
        </svg>
      </label>

      <nav class="nav-links" aria-label="Principal">
        <a href="#sobre">Sobre</a>
        <a href="#projetos">Projetos</a>
        <a href="#noticias">Notícias & Eventos</a>
        <a href="#galeria">Galeria</a>
        <a href="#contato" class="btn" style="padding:8px 12px;">Contato</a>
        <div class="nav-auth">
          <a href="login.php" class="btn-login">Entrar</a>
          <a href="cadastro.php" class="btn-signup">Criar conta</a>
        </div>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero" id="conteudo" aria-labelledby="titulo-hero">
    <div class="container">
      <div>
        <div class="kicker">Universidade & Sociedade</div>
        <h1 id="titulo-hero">Extensão que transforma realidades</h1>
        <p class="lead">Projetos de impacto social conduzidos por estudantes e docentes, aproximando o conhecimento
          acadêmico das necessidades da comunidade.</p>
        <div class="cta">
          <a href="#projetos" class="btn primary">Ver projetos</a>
          <a href="#contato" class="btn ghost">Quero participar</a>
        </div>
        <div class="stats">
          <div class="stat">
            <div class="n">+42</div>
            <div class="t">Projetos ativos</div>
          </div>
          <div class="stat">
            <div class="n">2.5k</div>
            <div class="t">Pessoas alcançadas</div>
          </div>
          <div class="stat">
            <div class="n">+18</div>
            <div class="t">Parcerias</div>
          </div>
        </div>
      </div>
      <div class="hero-card" aria-label="Destaques">
        <div class="badge">Destaque da Semana</div>
        <div class="spacer"></div>
        <h3>Oficina de Inclusão Digital</h3>
        <p class="muted">Capacitação básica em informática para idosos do bairro Jardim Esperança. Aulas presenciais,
          material impresso e suporte contínuo.</p>
        <div class="tags">
          <span class="tag">Educação</span>
          <span class="tag">Tecnologia</span>
          <span class="tag">Comunidade</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Sobre -->
  <section id="sobre" aria-labelledby="titulo-sobre">
    <div class="container">
      <div class="head">
        <h2 id="titulo-sobre">O que são atividades extensionistas?</h2>
        <p class="sub">A extensão universitária integra ensino e pesquisa com as demandas da sociedade, promovendo ações
          educativas, culturais e tecnológicas que geram desenvolvimento humano e social.</p>
      </div>
      <div class="grid cols-3">
        <article class="card">
          <div class="p">
            <h3>Objetivos</h3>
            <p class="muted">Promover trocas de saberes, formar cidadãos críticos, ampliar o acesso ao conhecimento e
              fortalecer vínculos com a comunidade.</p>
          </div>
        </article>
        <article class="card">
          <div class="p">
            <h3>Metodologia</h3>
            <p class="muted">Diagnóstico participativo, planejamento colaborativo, execução em campo, avaliação de
              impacto e divulgação científica dos resultados.</p>
          </div>
        </article>
        <article class="card">
          <div class="p">
            <h3>Princípios</h3>
            <p class="muted">Ética, inclusão, sustentabilidade, respeito às diversidades e foco em problemas reais do
              território.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Projetos -->
  <section id="projetos" aria-labelledby="titulo-projetos">
    <div class="container">
      <div class="head">
        <h2 id="titulo-projetos">Projetos</h2>
        <p class="sub">Conheça iniciativas em andamento e concluídas. Use as etiquetas para identificar áreas de
          atuação.</p>
      </div>
      <div class="grid cols-3">
        <article class="card">
          <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?q=80&w=1200&auto=format&fit=crop"
            alt="Aula de informática com estudantes auxiliando idosos" loading="lazy" />
          <div class="p">
            <h3>Inclusão Digital para Idosos</h3>
            <p class="muted">Capacitação em uso de smartphones, segurança online e serviços públicos digitais.</p>
            <div class="tags"><span class="tag">Tecnologia</span><span class="tag">Cidadania</span></div>
          </div>
        </article>
        <article class="card">
          <img src="https://images.unsplash.com/photo-1478479405421-ce83c92fb3b1?q=80&w=1200&auto=format&fit=crop"
            alt="Mutirão ambiental com coleta de resíduos" loading="lazy" />
          <div class="p">
            <h3>Mutirão Verde</h3>
            <p class="muted">Ações de reflorestamento urbano, trilhas educativas e coleta seletiva nos bairros.</p>
            <div class="tags"><span class="tag">Meio Ambiente</span><span class="tag">Sustentabilidade</span></div>
          </div>
        </article>
        <article class="card">
          <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?q=80&w=1200&auto=format&fit=crop"
            alt="Oficina de saúde preventiva com profissionais e comunidade" loading="lazy" />
          <div class="p">
            <h3>Saúde em Foco</h3>
            <p class="muted">Educadores e profissionais realizam oficinas de prevenção e promoção de saúde.</p>
            <div class="tags"><span class="tag">Saúde</span><span class="tag">Bem-estar</span></div>
          </div>
        </article>
        <article class="card">
          <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=1200&auto=format&fit=crop"
            alt="Círculo de leitura com crianças" loading="lazy" />
          <div class="p">
            <h3>Clube de Leitura</h3>
            <p class="muted">Mediação de leitura em escolas públicas e doação de acervo para bibliotecas comunitárias.
            </p>
            <div class="tags"><span class="tag">Educação</span><span class="tag">Cultura</span></div>
          </div>
        </article>
        <article class="card">
          <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1200&auto=format&fit=crop"
            alt="Mentoria de empreendedores locais" loading="lazy" />
          <div class="p">
            <h3>Empreenda+ Comunidade</h3>
            <p class="muted">Mentorias e oficinas para pequenos negócios locais e economia solidária.</p>
            <div class="tags"><span class="tag">Gestão</span><span class="tag">Economia</span></div>
          </div>
        </article>
        <article class="card">
          <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1200&auto=format&fit=crop"
            alt="Oficina de alimentação saudável" loading="lazy" />
          <div class="p">
            <h3>Cozinha Sustentável</h3>
            <p class="muted">Oficinas de aproveitamento integral de alimentos e combate ao desperdício.</p>
            <div class="tags"><span class="tag">Nutrição</span><span class="tag">Sustentabilidade</span></div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Notícias & Eventos -->
  <section id="noticias" aria-labelledby="titulo-noticias">
    <div class="container">
      <div class="head">
        <h2 id="titulo-noticias">Notícias & Eventos</h2>
        <p class="sub">Fique por dentro das últimas atualizações, chamadas públicas e resultados.</p>
      </div>
      <div class="news">
        <article class="news-item">
          <div>
            <time datetime="2025-08-14">14 ago 2025</time>
            <h3>Resultado do Edital de Bolsas de Extensão</h3>
            <p class="meta">Foram contemplados 12 projetos em diferentes áreas, com início das atividades em setembro.
            </p>
          </div>
        </article>
        <article class="news-item">
          <div>
            <time datetime="2025-07-30">30 jul 2025</time>
            <h3>Seminário de Boas Práticas Extensionistas</h3>
            <p class="meta">Evento aberto com apresentação de resultados e mesas temáticas sobre avaliação de impacto.
            </p>
          </div>
        </article>
        <article class="news-item">
          <div>
            <time datetime="2025-06-05">05 jun 2025</time>
            <h3>Parceria com ONG VerdeVivo</h3>
            <p class="meta">Acordo amplia ações de educação ambiental em três bairros periféricos.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- Galeria -->
  <section id="galeria" aria-labelledby="titulo-galeria">
    <div class="container">
      <div class="head">
        <h2 id="titulo-galeria">Galeria</h2>
        <p class="sub">Registros das ações no território. Envie suas fotos pelo formulário de contato!</p>
      </div>
      <div class="gallery">
        <figure>
          <img src="https://images.unsplash.com/photo-1555636222-cae831e670b1?q=80&w=1200&auto=format&fit=crop"
            alt="Equipe em atividade de campo com a comunidade" loading="lazy" />
          <figcaption>Visita técnica ao CRAS do bairro.</figcaption>
        </figure>
        <figure>
          <img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1200&auto=format&fit=crop"
            alt="Oficina prática em sala multiuso" loading="lazy" />
          <figcaption>Oficina de prototipagem rápida.</figcaption>
        </figure>
        <figure>
          <img src="https://images.unsplash.com/photo-1543339308-43f2a70b7a14?q=80&w=1200&auto=format&fit=crop"
            alt="Palestra com participação popular" loading="lazy" />
          <figcaption>Palestra sobre economia solidária.</figcaption>
        </figure>
        <figure>
          <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?q=80&w=1200&auto=format&fit=crop"
            alt="Mutirão de limpeza em praça" loading="lazy" />
          <figcaption>Mutirão de limpeza e plantio.</figcaption>
        </figure>
        <figure>
          <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=1200&auto=format&fit=crop"
            alt="Mentoria com empreendedores locais" loading="lazy" />
          <figcaption>Mentoria para pequenos negócios.</figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- Contato -->
  <section id="contato" aria-labelledby="titulo-contato">
    <div class="container">
      <div class="head">
        <h2 id="titulo-contato">Fale com a equipe</h2>
        <p class="sub">Envie dúvidas, propostas de parceria ou peça informações sobre participação como voluntário(a).
        </p>
      </div>
      <form action="#" method="post" aria-describedby="aviso">
        <div class="row">
          <div>
            <label for="nome">Nome</label>
            <input id="nome" name="nome" placeholder="Seu nome completo" required aria-required="true" />
          </div>
          <div>
            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" placeholder="voce@email.com" required aria-required="true" />
          </div>
        </div>
        <div class="row">
          <div>
            <label for="assunto">Assunto</label>
            <select id="assunto" name="assunto">
              <option>Parceria</option>
              <option>Inscrição</option>
              <option>Imprensa</option>
              <option>Outro</option>
            </select>
          </div>
          <div>
            <label for="projeto">Projeto (opcional)</label>
            <input id="projeto" name="projeto" placeholder="Ex.: Mutirão Verde" />
          </div>
        </div>
        <div>
          <label for="mensagem">Mensagem</label>
          <textarea id="mensagem" name="mensagem" placeholder="Conte como podemos ajudar"></textarea>
        </div>
        <p id="aviso" class="muted">* Este formulário é demonstrativo (HTML/CSS). Para envio real, integre com back-end
          ou serviço de formulários.</p>
        <button class="btn primary" type="submit">Enviar mensagem</button>
      </form>
    </div>
  </section>

  <div class="container">
    <div class="divider" role="presentation"></div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container footer-grid">
      <div>
        <strong>Atividades Extensionistas</strong>
        <p class="muted">Conhecimento aplicado para transformar realidades. Universidade, comunidade e parceiros
          caminhando juntos.</p>
      </div>
      <div>
        <strong>Mapa do site</strong>
        <ul class="footer-links">
          <li><a href="#sobre">Sobre</a></li>
          <li><a href="#projetos">Projetos</a></li>
          <li><a href="#noticias">Notícias & Eventos</a></li>
          <li><a href="#galeria">Galeria</a></li>
          <li><a href="#contato">Contato</a></li>
        </ul>
      </div>
      <div>
        <strong>Contato</strong>
        <p class="muted">Rua Exemplo, 123 – Centro<br />Sua Cidade – UF<br />+55 (00)
          0000-0000<br />contato@extensao.edu.br</p>
      </div>
      <div>
        <strong>Redes</strong>
        <ul class="footer-links">
          <li><a href="#">Instagram</a></li>
          <li><a href="#">YouTube</a></li>
          <li><a href="#">LinkedIn</a></li>
        </ul>
      </div>
    </div>
    <div class="container footer-bottom">
      <small class="muted">© <span id="ano">2025</span> — Programa de Extensão</small>
      <small class="muted">Desenvolvido por estudantes de Engenharia de Software</small>
    </div>
  </footer>

</body>

</html>