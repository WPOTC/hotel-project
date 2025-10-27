<?php
require_once 'DB/Database.php';
require_once 'Controller/ReservasController.php';

$ReservasController = new ReservasController($pdo);

$Reservas = $ReservasController->listar();

?>

