<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Cadastro dos Quartos</title>
</head>
<body>
    <form method="post">
     <label for="nome">nome :</label>
     <input type="text" name="nome" required> <br><br>

     <label for="text">descrição:</label>
     <input type="text"id="text" name="nome" required> <br><br>

      <label>imagem do quarto:</label>
     <input type="file"name="imagens[]"accept="image/" multiple required><br>


     <input type="submit" value="cadastrar quarto">

    </form>
</body>
</html>

<?php

require_once "C:/Turma1/xampp/htdocs/mvc/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/mvc/Controller/QuartosController.php";

$QuartosController = new QuartosController($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST['data'];
    $hospedes = $_POST['hospedes'];
    $ocupacao = $_POST['ocupacao'];

    $resultado = $ReservasControllerController->cadastrar($data, $hospedes, $ocupacao);
    header("Location: ../../index.php");

    if($resultado){
        echo "<p>Cliente cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar usuário.</p>";
    }
}