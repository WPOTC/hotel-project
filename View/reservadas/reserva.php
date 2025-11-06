<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserva</title>
  <link rel="stylesheet" href="../css/reservar.css">
</head>
<?php
session_start();
?>
<body>
<?php


if(isset($_SESSION['email']) && $_SESSION['email'] == 'v1ll4s0l@gmail.com'){
   echo '<nav>
    <div class="menu">

      <div class="menulogo">
        <img src="img/logo-2.png" alt="">
      </div>

      <div class="textos-nav">
        <h1>Hotel Villa do Sol</h1>

        <ul>
          <li><a href="index.php">INÍCIO</a></li>
          <li><a href="quartos.php">QUARTO</a></li>
          <li><a href="sobre.php">SOBRE NÓS</a></li>
          <li><a href="View/reservadas/listarReserva.php">RESERVAS</a></li>

        </ul>
      </div>
    </div>';
}else{
  echo '<nav>
    <div class="menu">

      <div class="menulogo">
        <img src="img/logo-2.png" alt="">
      </div>

      <div class="textos-nav">
        <h1>Hotel Villa do Sol</h1>

        <ul>
          <li><a href="index.php">INÍCIO</a></li>
          <li><a href="quartos.php">QUARTOS</a></li>
          <li><a href="sobre.php">SOBRE NÓS</a></li>

        </ul>
      </div>
    </div>';
}


    if(isset($_SESSION['nome'])){
            echo "<div class='usuario'><a href = 'View/Usuario/exibirUsuario.php'class='cadastro'><img src='img/logo-cadastro-feito.png'></a>" . "Seja bem-vindo(a),  " . htmlspecialchars($_SESSION['nome']) . "!</div>";
        }elseif(!isset($_SESSION['nome'])){
            echo "<a href = 'View/Usuario/cadastrarUsuario.php' class='cadastro'><img src='img/logo-cadastro.png'></a>";

        }
        ?>
  </nav>
<footer class="footer-simple" role="contentinfo">
    <div class="container">
      <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
        Número de contato: (11) 1234-5678. Email:villasol@gmail.com
      </p>
    </div>
  </footer>
<?php
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/ReservasController.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";

$ReservasController = new ReservasController($pdo);

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