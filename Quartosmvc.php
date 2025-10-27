<?php
require_once 'DB/Database.php';
require_once 'Controller/QuartosController.php';

$QuartosController = new QuartosController($pdo);

$Quartos = $QuartosController->listar();

?>