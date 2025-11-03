<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Previsão de Entrada:</label>
        <input type="datetime" name="datetime" required>
        <input type="submit" value="reservar">
    </form>
</body>
</html>




<?php
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/CadastroController.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";

$UsuarioController = new UsuarioController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $reserva = $_POST['datetime'];


  
 

  
 $reservar = $UsuarioController -> reservar($reserva);
  if($reservar){
            $UsuarioController->loginUsuario($email,$senha);
            header('Location: ../../index.php');
        }else{
            echo "Email já cadastrado!";
        }
    }
?>