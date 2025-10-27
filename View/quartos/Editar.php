<?php

require_once "C:/Turma1/xampp/htdocs/mvc/DB/Database.php";
require_once  "C:/Turma1/xampp/htdocs/mvc/Controller/QuartosController.php";

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
      <input type="text" name="nome" value="<?=$Reservas['nome']?>" required> <br>

        <label for="text">Descrição:</label>
        <input type="text" name="text" value="<?=$Reservas['descrição'];?>" required> <br>

        <input type="submit" >
        </form>
    </body>
    </html>
        <?php
        }else{
            header ("Location: listar.php");
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
          

           $QuartosController->editar( $nome, $ocupacao,  $id);

              header("Location: ../../index.php");
        }