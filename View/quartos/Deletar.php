<?php

require_once "C:/Turma1/xampp/htdocs/mvc/DB/Database.php";
require_once  "C:/Turma1/xampp/htdocs/mvc/Controller/QuartosController.php";

$QuartosControllerController = new QuartosController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Quartos = $QuartosController->deletarQuartos($id);
      header ("Location: ../../index.php");
}else{
    header ("Location: ../../index.php");
}


?>