<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once  "C:/Turma1/xampp/htdocs/hotel-project/Controller/ReservasController.php";

$ReservasController = new ReservasController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Reservas = $ReservasController->buscarReservas($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reservas</title>
</head>
<body>
    <form method="post">
      <label for="nome">Data:</label>
      <input type="text" name="nome" value="<?=$Reservas['data']?>" required> <br>

        <label for="text">Hóspede:</label>
        <input type="text" name="text" value="<?=$Reservas['hospedes'];?>" required> <br>

        <label for="senha">Ocupação:</label>
        <input type="password" name="senha" value="<?=$Reservas['usocupacao'];?>" required> <br>


        <input type="submit" >
        </form>
    </body>
    </html>
        <?php
        }else{
            header ("Location: listar.php");
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST['data'];
            $hospedes = $_POST['hospedes'];
            $ocupacao = $_POST['ocupacao'];

           $ReservasController->editar( $data, $hospedes, $ocupacao, $id);

              header("Location: ../../index.php");
        }