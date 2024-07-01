<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta dos dados do formulário
    $nome = htmlspecialchars($_POST["nome"]);
    $data_nascimento = htmlspecialchars($_POST["data_nascimento"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $email = htmlspecialchars($_POST["email"]);
    $experiencias = $_POST["experiencia"];
    $formacoes = $_POST["formacao"];

    // Geração do conteúdo do currículo em HTML
    $curriculo = "<html><head><style>
        body { font-family: Arial, sans-serif; margin: 20px; padding: 20px; }
        h1 { text-align: center; }
        .section { margin-bottom: 20px; }
        .section h2 { border-bottom: 1px solid #ddd; padding-bottom: 5px; }
        .section p { margin: 5px 0; }
        </style></head><body>";
    $curriculo .= "<h1>Currículo de $nome</h1>";
    $curriculo .= "<div class='section'><h2>Dados Pessoais</h2>
        <p><strong>Nome:</strong> $nome</p>
        <p><strong>Data de Nascimento:</strong> $data_nascimento</p>
        <p><strong>Telefone:</strong> $telefone</p>
        <p><strong>Email:</strong> $email</p>
    </div>";

    if (!empty($experiencias)) {
        $curriculo .= "<div class='section'><h2>Experiências Profissionais</h2>";
        foreach ($experiencias as $experiencia) {
            $cargo = htmlspecialchars($experiencia["cargo"]);
            $empresa = htmlspecialchars($experiencia["empresa"]);
            $periodo = htmlspecialchars($experiencia["periodo"]);
            $curriculo .= "<p><strong>Cargo:</strong> $cargo</p>
                <p><strong>Empresa:</strong> $empresa</p>
                <p><strong>Período:</strong> $periodo</p><br>";
        }
        $curriculo .= "</div>";
    }

    if (!empty($formacoes)) {
        $curriculo .= "<div class='section'><h2>Formação Acadêmica</h2>";
        foreach ($formacoes as $formacao) {
            $instituicao = htmlspecialchars($formacao["instituicao"]);
            $curso = htmlspecialchars($formacao["curso"]);
            $situacao = htmlspecialchars($formacao["situacao"]);
            $conclusao = htmlspecialchars($formacao["conclusao"]);
            $curriculo .= "<p><strong>Instituição:</strong> $instituicao</p>
                <p><strong>Curso:</strong> $curso</p>
                <p><strong>Situação:</strong> $situacao</p>
                <p><strong>Data de Conclusão:</strong> $conclusao</p><br>";
        }
        $curriculo .= "</div>";
    }

    $curriculo .= "<button onclick='window.print()'>Imprimir Currículo</button>";
    $curriculo .= "</body></html>";

    // Retorna o currículo gerado para ser exibido na nova janela
    echo $curriculo;
    exit;
}
?>
