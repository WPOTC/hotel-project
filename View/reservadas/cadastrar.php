<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
     <label for="nome">data :</label>
     <input type="text" name="nome" required> <br><br>

     <label for="text">hospede:</label>
     <input type="text"id="text" name="nome" required> <br><br>

      <label for="text">ocupação:</label>
     <input type="text"name="nome" required><br>


     <input type="submit" value="cadastrar">

    </form>
</body>
</html>

<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/ReservasController.php";

$ReservasController = new ReservasController($pdo);

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