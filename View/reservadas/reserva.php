<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserva</title>
  <link rel="stylesheet" href="../../css/reservar.css">
</head>
<?php
session_start();
?>

<body>

  <?php


  if (isset($_SESSION['email']) && $_SESSION['email'] == 'v1ll4s0l@gmail.com') {
    echo '<nav>
    <div class="menu">

      <div class="menulogo">
        <img src="../../img/logo-cadastro.png" alt="img">
      </div>

      <div class="textos-nav">
        <h1>Hotel Villa do Sol</h1>

        <ul>
          <li><a href="../../index.php">INÍCIO</a></li>
          <li><a href="../../quartos.php">QUARTO</a></li>
          <li><a href="../../sobre.php">SOBRE NÓS</a></li>
          <li><a href="View/reservadas/listarReserva.php">RESERVAS</a></li>

        </ul>
      </div>
    </div>';
  } else {
    echo '<nav>
    <div class="menu">

      <div class="menulogo">
        <img src="../../img/logo-2.png" alt="">
      </div>

      <div class="textos-nav">
        <h1>Hotel Villa do Sol</h1>

        <ul>
          <li><a href="../../index.php">INÍCIO</a></li>
          <li><a href="../../quartos.php">QUARTOS</a></li>
          <li><a href="../../sobre.php">SOBRE NÓS</a></li>

        </ul>
      </div>
    </div>';
  }


  if (isset($_SESSION['nome'])) {
    echo "<div class='usuario'><a href = 'View/Usuario/exibirUsuario.php'class='cadastro'><img src='../../img/logo-cadastro-feito.png'></a>" . "Seja bem-vindo(a),  " . htmlspecialchars($_SESSION['nome']) . "!</div>";
  } elseif (!isset($_SESSION['nome'])) {
    echo "<a href = 'View/Usuario/cadastrarUsuario.php' class='cadastro'><img src='../../img/logo-cadastro.png'></a>";

  }
  ?>

  </nav>
  <section>
    <header>
      <img src="../../img/logo.png" alt="">
      <h1 class="cortitulo">Faça sua reserva</h1><br>
    </header>
    <form method="POST">

    <?php
    // Conexão
    $pdo = new PDO("mysql:host=localhost;dbname=hotel", "root", "");

    // Busca dos hóspedes
    $stmt = $pdo->query("SELECT id, nome, telefone FROM cadastro");
    $hospedes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Busca dos quartos
    $stmt2 = $pdo->query("SELECT id, nome_quarto FROM quartos");
    $quartos = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- DROPDOWN DE QUARTOS -->
    <label for="id_quarto">Selecione o Quarto:</label>
    <select name="id_quarto" id="id" class="form-control" required>
        <option value="">-- Escolha um quarto --</option>
        <?php foreach ($quartos as $q): ?>
            <option value="<?= $q['id'] ?>">
                <?= $q['id'] ?> - <?= $q['nome_quarto'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

  

    <!-- DATA -->
    <label>Data da reserva:</label>
    <input type="date" name="data" required>

    <br><br>

    <button type="submit">Reservar</button>
</form> 
  </section>
  <footer class="footer-simple" role="contentinfo">
    <div class="container">
      <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
        Número de contato: (11) 1234-5678. Email:villasol@gmail.com
      </p>
      <button><a href='../View/reservadas/reserva.php'>Agendar</a></button>
    </div>
  </footer>
  <?php
  require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/ReservasController.php";
  require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";

  $ReservasController = new ReservasController($pdo);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $reserva = $_POST['data'];
    $idQuarto = $_POST['id_quarto'];
    $idUsuario = $_POST['id_usuario'];

    $controller = new ReservasController($pdo);

    if(!isset($_SESSION['nome'])){
            echo "Você precisa estar logado na sua conta antes de reservar.";

        }elseif(isset($_SESSION['nome'])) { 
      $controller->reservar($reserva, $idQuarto, $idUsuario);
      echo "Reserva feita com sucesso!";
    } else {
      echo "Erro ao fazer reserva!";
    }
  }


  ?>