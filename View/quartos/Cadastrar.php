<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastro dos Quartos</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
     <label for="nome">nome :</label>
     <input type="text" name="nome" required> <br><br>

     <label for="text">descrição:</label>
     <input type="text"id="text" name="descricao" required> <br><br>

      <label>imagem do quarto:</label>
     <input type="file"name="imagens[]"accept="image/" multiple required><br>


     <input type="submit" value="cadastrar quarto">

    </form>
</body>
</html>

<?php

require_once "C:/Turma1/xampp/htdocs/divineshop/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/divineshop/Controller/QuartosController.php";

$QuartosController = new QuartosController($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $imagens = $_FILES['imagens'];

    $resultado = $QuartosController->cadastrar( $nome, $descricao, $imagens);
    header("Location: ../../index.php");

    if($resultado){
        echo "<p>Quarto cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar quarto.</p>";
    }
}