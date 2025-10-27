<?php

require_once "C:/Turma1/xampp/htdocs/mvc/DB/Database.php";
require_once  "C:/Turma1/xampp/htdocs/mvc/Controller/ReservasController.php";

$ReservasController = new ReservasController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Reservas = $ReservasController->deletarReservas($id);
      header ("Location: ../../index.php");
}else{
    header ("Location: ../../index.php");
}


?>
