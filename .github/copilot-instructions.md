## Objetivo

Instruções concisas para agentes de código que vão editar este repositório PHP procedural (aplicação web simples localizada em `public/`). Forneça mudanças pequenas, verificáveis e compatíveis com a estrutura existente.

## Visão geral (big picture)

- O app é um site em PHP + MySQL para gerenciar projetos de extensão. Código principal em `public/`.
- Estrutura: páginas PHP procedurais que fazem `include 'templates/header.php'` e `templates/footer.php` para layout. Banco de dados via `public/conexao.php` (mysqli, variável `$conn`). Uploads ficam em `public/uploads/`.

## Como iniciar e debugar localmente

- Servir a pasta `public/` com o servidor PHP embutido (desenvolvimento rápido):

```bash
cd public
php -S localhost:8000
```

- Ajuste `public/conexao.php` para apontar ao seu MySQL local (host/db/user/pass). Não há .env por padrão.

## Convenções de código e padrões úteis

- Procedural PHP: HTML e PHP misturados em arquivos `.php`. Prefira mudanças locais (não refatore todo o app em uma única PR).
- Sessões: `session_start()` é chamado em várias páginas e também em `templates/header.php`. Evite duplicar saídas antes de `session_start()` para não causar "headers already sent".
- Includes: use `templates/header.php` / `templates/footer.php` para consistência visual e para reusar menu/autenticação.
- Banco: `require_once 'conexao.php'` fornece `$conn`. Algumas páginas usam prepared statements (`meus_projetos.php`), outras usam queries diretas. Preserve o uso de prepared statements ao inserir parâmetros do usuário.
- Uploads: `cadastrar_projeto.php` move arquivos para `uploads/` usando `move_uploaded_file()` e prefixa o nome com `time()`. Preservar esse comportamento evita conflitos de nomes.

## Observações detectadas (faça atenção)

- `cadastrar_projeto.php` contém código que tenta ler `$usuario_id = $_SESSION['usuario_id'];` mas não o usa na inserção `INSERT`—verifique antes de alterar para evitar regressões.
- A chamada a `bind_param` em `cadastrar_projeto.php` aparece desajustada (tipos/ordem) comparada às colunas no `INSERT`. Se for corrigir, escreva testes manuais ou valide no banco local.
- Credenciais MySQL estão em texto claro (`conexao.php`). Se for necessário, extraia para variáveis de ambiente e documente a migração.

## Exemplos concretos (padrões usados no código)

- Incluir conexão e usar `$conn`:

```php
require_once 'conexao.php';
$sql = "SELECT * FROM projetos ORDER BY id DESC";
$result = $conn->query($sql);
```

- Buscar apenas projetos do usuário (prepared statement):

```php
require_once 'conexao.php';
$sql = "SELECT * FROM projetos WHERE usuario_id = ? ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
```

- Upload de arquivo (padronizado):

```php
$diretorio = "uploads/";
if (!is_dir($diretorio)) mkdir($diretorio, 0755, true);
$nome_arquivo = time() . "_" . basename($_FILES['projeto_arquivo']['name']);
move_uploaded_file($_FILES['projeto_arquivo']['tmp_name'], $diretorio . $nome_arquivo);
```

## Quando abrir PRs

- Prefira PRs pequenos que alterem uma responsabilidade por vez (ex.: conserto de um prepared statement, correção de upload, melhoria na sanitização de um único formulário).
- Teste localmente com o servidor PHP embutido e um banco MySQL test (atualize `conexao.php`).
- Documente mudanças que alterem contratos (nomes de colunas, layout de uploads, autenticação).

## Arquivos para inspecionar primeiro

- `public/conexao.php` — conexão com DB
- `public/cadastrar_projeto.php` — processamento e uploads
- `public/cadastro_projeto.php` — formulário de entrada
- `public/meus_projetos.php` — exemplo de autorização/prepared statement
- `public/templates/header.php` e `footer.php` — layout e sessão

Se algo aqui estiver incompleto ou se você quiser que eu inclua scripts de migração/SQL ou instruções de teste mais detalhadas, diga quais partes devo priorizar.
