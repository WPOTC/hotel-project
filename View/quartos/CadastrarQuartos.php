<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastro dos Quartos</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label for="nome">nome:</label>
        <input type="text" name="nome" required> <br><br>

        <label for="numero">valor:</label>
        <input type="text" name="valor" required> <br><br>

        <label for="text">descrição:</label>
        <input type="text" id="text" name="descricao" required> <br><br>

        <label>imagem do quarto:</label>
        <input type="file" name="imagens[]" accept="image/*" multiple required><br><br>


        <input type="submit" value="cadastrar quarto">

    </form>
</body>

</html>

<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/QuartosController.php";

$QuartosController = new QuartosController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_quarto = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $imagens = $_FILES['imagens'];

    $resultado = $QuartosController->cadastrarQuartos($nome_quarto, $descricao, $imagens, $valor);

    header("Location: ../../index.php");

    if ($resultado) {
        echo "<p>Quarto cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar quarto.</p>";
    }
}