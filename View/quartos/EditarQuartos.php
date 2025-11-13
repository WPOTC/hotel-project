<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once  "C:/Turma1/xampp/htdocs/hotel-project/Controller/QuartosController.php";



$QuartosController = new QuartosController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Quartos = $QuartosController->buscarQuartos($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Quartos</title>
</head>
<body>
    <form method="post">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" value="<?=$Quartos['nome_quarto']?>" required> <br>

        <label for="text">Descrição:</label>
        <input type="text" name="text" value="<?=$Quartos['descricao'];?>" required> <br>

        <input type="submit" >
        </form>
    </body>
    </html>
        <?php
        }else{
            header ("Location: ListarQuartos.php");
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
          

           $QuartosController->editarQuartos( $nome, $ocupacao,  $id);

              header("Location: ../../index.php");
        }