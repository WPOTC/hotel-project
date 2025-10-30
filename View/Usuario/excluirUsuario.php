<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/CadastroController.php";

$UsuarioController = new UsuarioController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $usuario = $UsuarioController->deletarUsuario($id);
    header('Location: ../../index.php');
}else{
    header('Location: ../../index.php');
}

?>