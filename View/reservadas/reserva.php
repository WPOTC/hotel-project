<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserva</title>
  <link rel="stylesheet" href="../../css/reserva-quarto.css">
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
        <img src="../../img/logo-2.png" alt="img">
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
    </div>';
  }

  if (isset($_SESSION['nome'])) {
    echo "<div class='usuario'><a href = '../View/Usuario/exibirUsuario.php'class='cadastro'><img src='../../img/logo-cadastro-feito.png'></a>" . "Seja bem-vindo(a),  " . htmlspecialchars($_SESSION['nome']) . "!</div>";
  } elseif (!isset($_SESSION['nome'])) {
    echo "<a href = 'View/Usuario/cadastrarUsuario.php' class='cadastro'><img src='../../img/logo-cadastro.png'></a>";

  }
  ?>
</div>
  </nav>
  
  <a href="../../quartos.php" class="cadastro-voltar"><img src="../../img/logo-voltar.png"></a>
    
  <section>
    <header>
      <img src="../../img/logo.png" alt="">
      <h1 class="cortitulo">Faça sua reserva</h1><br>
    </header>
        
    
    <form method="POST">
      <input type="hidden" name="id_quarto" value="<?= $idQuarto ?>">
      <?php
// Exemplo de conexão PDO
$pdo = new PDO("mysql:host=localhost;dbname=hotel", "root", "");

// Busca os dados dos hóspedes
$stmt = $pdo->query("SELECT id, nome, telefone, data_inicio FROM hospedes");
$hospedes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<label for="hospede">Selecione o Hóspede:</label>
<select name="hospede" id="hospede" class="form-control">
    <option value="">-- Escolha --</option>

    <?php foreach ($hospedes as $h): ?>
        <option value="<?= $h['id'] ?>">
            <?= $h['nome'] ?> - <?= $h['telefone'] ?> - <?= date('d/m/Y', strtotime($h['data_inicio'])) ?>
        </option>
    <?php endforeach; ?>

</select>

      <label>Data da reserva:</label>
      <input type="date" name="data" required>
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
    $idQuarto ='11' ;
    $idUsuario = $_SESSION['nome'];

    $controller = new ReservasController($pdo);
    if ($controller->reservar($reserva,  $idQuarto,$idUsuario )) {
      echo "Reserva feita com sucesso!";
    } else {
      echo "Erro ao fazer reserva!";
    }
  }
  ?>