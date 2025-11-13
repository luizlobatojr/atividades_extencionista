<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Projeto Extensionista</title>
<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background-color: #f7f8fa;
        margin: 0;
        padding: 0;
    }
    .form-container {
        max-width: 750px;
        margin: 50px auto;
        background: #fff;
        padding: 40px 50px;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    }
    h2, h3 {
        color: #333;
        margin-bottom: 20px;
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
    }
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
    }
    input, select, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }
    textarea {
        resize: vertical;
    }
    input[type="file"] {
        padding: 5px;
    }
    input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .checkbox-group {
        margin-bottom: 20px;
    }
    .section-divider {
        border: none;
        border-top: 1px solid #ddd;
        margin: 25px 0;
    }
</style>
</head>
<body>
<div class="form-container">
    <h2>Cadastro de Projeto Extensionista</h2>
    <form action="/enviar_projeto" method="POST" enctype="multipart/form-data">
        
        <!-- Identificação do Projeto -->
        <h3>1. Identificação do Projeto</h3>
        <label for="titulo">Título do Projeto</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="descricao">Resumo / Descrição</label>
        <textarea id="descricao" name="descricao" rows="4" required></textarea>

        <label for="area">Área Temática</label>
        <select id="area" name="area" required>
            <option value="">Selecione</option>
            <option>Educação</option>
            <option>Saúde</option>
            <option>Meio Ambiente</option>
            <option>Tecnologia e Inovação</option>
            <option>Cultura</option>
            <option>Direitos Humanos</option>
            <option>Trabalho</option>
        </select>

        <label for="objetivo">Objetivos</label>
        <textarea id="objetivo" name="objetivo" rows="3" required></textarea>

        <label for="publico">Público-Alvo</label>
        <input type="text" id="publico" name="publico" required>

        <label for="local">Local de Realização</label>
        <input type="text" id="local" name="local" required>

        <label for="carga_horaria">Carga Horária Total (em horas)</label>
        <input type="number" id="carga_horaria" name="carga_horaria" min="1" required>

        <label for="data_inicio">Data de Início</label>
        <input type="date" id="data_inicio" name="data_inicio" required>

        <label for="data_fim">Data de Término</label>
        <input type="date" id="data_fim" name="data_fim" required>

        <hr class="section-divider">

        <!-- Coordenador -->
        <h3>2. Coordenador do Projeto</h3>
        <label for="nome_coordenador">Nome Completo</label>
        <input type="text" id="nome_coordenador" name="nome_coordenador" required>

        <label for="matricula_coordenador">Matrícula / SIAPE</label>
        <input type="text" id="matricula_coordenador" name="matricula_coordenador" required>

        <label for="email_coordenador">E-mail Institucional</label>
        <input type="email" id="email_coordenador" name="email_coordenador" required>

        <label for="telefone_coordenador">Telefone</label>
        <input type="tel" id="telefone_coordenador" name="telefone_coordenador" pattern="\d{10,11}" title="Digite apenas números" required>

        <label for="curso_coordenador">Curso / Departamento</label>
        <input type="text" id="curso_coordenador" name="curso_coordenador" required>

        <hr class="section-divider">

        <!-- Vinculação Acadêmica -->
        <h3>3. Vinculação Acadêmica</h3>
        <label for="tipo_atividade">Tipo de Atividade</label>
        <select id="tipo_atividade" name="tipo_atividade" required>
            <option value="">Selecione</option>
            <option>Projeto</option>
            <option>Programa</option>
            <option>Curso</option>
            <option>Evento</option>
            <option>Prestação de Serviço</option>
        </select>

        <label for="modalidade">Modalidade</label>
        <select id="modalidade" name="modalidade" required>
            <option value="">Selecione</option>
            <option>Presencial</option>
            <option>Remoto</option>
            <option>Híbrido</option>
        </select>

        <hr class="section-divider">

        <!-- Upload de Documentos -->
        <h3>4. Documentos Anexos</h3>
        <label for="projeto_arquivo">Projeto Completo (PDF ou DOCX)</label>
        <input type="file" id="projeto_arquivo" name="projeto_arquivo" accept=".pdf,.doc,.docx" required>

        <label for="cronograma">Plano de Trabalho / Cronograma (PDF ou DOCX)</label>
        <input type="file" id="cronograma" name="cronograma" accept=".pdf,.doc,.docx">

        <label for="termo">Termo de Compromisso (PDF)</label>
        <input type="file" id="termo" name="termo" accept=".pdf">

        <hr class="section-divider">

        <!-- Consentimento -->
        <h3>5. Declarações</h3>
        <div class="checkbox-group">
            <label><input type="checkbox" name="declaracao1" required> Declaro que as informações prestadas são verdadeiras.</label>
            <label><input type="checkbox" name="declaracao2" required> Concordo com as normas institucionais de extensão.</label>
            <label><input type="checkbox" name="declaracao3"> Autorizo o uso dos meus dados e imagem para fins acadêmicos.</label>
        </div>

        <input type="submit" value="Enviar Cadastro">
    </form>
</div>
</body>
</html>
