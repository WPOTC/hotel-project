<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Quartos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f5f5f5;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .mensagem {
            margin-top: 20px;
            padding: 10px;
            background: #e7f3e7;
            border: 1px solid #b2d8b2;
            color: #256029;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h1>Cadastro de Quartos</h1>

    <!-- FORMULÁRIO DE CADASTRO -->
    <form method="post" enctype="multipart/form-data">
        <label for="nome">Nome do quarto:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor" placeholder="Ex: 250.00" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="5" required></textarea>

        <label for="imagens">Imagens do quarto:</label>
        <input type="file" name="imagens[]" id="imagens" accept="image/*" multiple required>

        <input type="submit" value="Cadastrar Quarto">
    </form>

</body>
</html>

<?php
// -------------------- PROCESSAMENTO PHP --------------------

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/QuartosController.php";

// Instancia o controller
$QuartosController = new QuartosController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_quarto = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $imagens = $_FILES['imagens'] ;

    // Cria o diretório de uploads (se não existir)
    $diretorioImagens = "C:/Turma1/xampp/htdocs/hotel-project/uploads/quartos/";
    if (!is_dir($diretorioImagens)) {
        mkdir($diretorioImagens, 0777, true);
    }

    // Move as imagens para o diretório
    $imagensSalvas = [];
    if ($imagens && isset($imagens['tmp_name'])) {
        foreach ($imagens['tmp_name'] as $index => $tmpName) {
            if (!empty($tmpName)) {
                $nomeArquivo = basename($imagens['name'][$index]);
                $caminhoDestino = $diretorioImagens . $nomeArquivo;
                if (move_uploaded_file($tmpName, $caminhoDestino)) {
                    $imagensSalvas[] = "uploads/quartos/" . $nomeArquivo; // caminho relativo
                }
            }
        }
    }

    
    // Se cadastrou o quarto, salva as imagens associadas
    // if ($resultado && !empty($imagensSalvas)) {
    //     foreach ($imagensSalvas as $img) {
    //         $QuartosController->salvarImagemQuarto($resultado, $img);
    //     }
    // }
    // Cadastra no banco
    $resultado = $QuartosController->cadastrarQuartos($nome_quarto, $descricao, $imagens, $valor);

    // Mensagem de retorno
    if ($resultado) {
        echo "<div class='mensagem'>✅ Quarto <b>$nome_quarto</b> cadastrado com sucesso!<br>";
        echo "<a href='../../index.php'>Voltar ao início</a></div>";
    } else {
        echo "<div class='mensagem' style='background:#fbeaea; border-color:#f2b2b2; color:#b22222;'>❌ Erro ao cadastrar o quarto.</div>";
    }
}
?>
