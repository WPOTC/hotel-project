<?php
require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Buscar reservas com dados do quarto e do hóspede
$stmt = $pdo->query("
    SELECT 
        r.id_reserva,
        r.data,
        c.nome AS nome_usuario,
        q.nome_quarto,
        q.valor
    FROM reserva r
    JOIN cadastro c ON r.id_usuario = c.id
    JOIN quartos q ON r.id_quarto = q.id
    ORDER BY r.id_reserva DESC
");

$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas - Hotel Villa do Sol</title>
  <link rel="stylesheet" href="../../css/reservar.css">
</head>

<body>

<?php
// Navbar (mantendo o CSS e a estrutura original)
if (isset($_SESSION['email']) && $_SESSION['email'] == 'v1ll4s0l@gmail.com') {
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
          <li><a href="listarReserva.php">RESERVAS</a></li>
        </ul>
      </div>';
      if (isset($_SESSION['nome'])) {
          echo "<div class='usuario'><a href='../Usuario/exibir' class='cadastro'>
          <img src='../../img/logo-cadastro-feito.png'></a>Seja bem-vindo(a), " . $_SESSION['nome'] . "!</div>";
      }
  echo '</div></nav>';
}
?>

<main class="container">

  <h2 class="titulo">Reservas Realizadas: </h2>

  <?php if (empty($reservas)): ?>
    <p class="titulo">Nenhuma reserva cadastrada.</p>
  <?php else: ?>
    <table border ="1" cellpadding="5" cellspacing="0" class="tabela-reservas">
      <thead>
        <tr>
          <th>ID</th>
          <th>Hóspede</th>
          <th>Quarto</th>
          <th>Valor</th>
          <th>Data da Reserva</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reservas as $reserva): ?>
          <tr>
            <td><?= htmlspecialchars($reserva['id_reserva']) ?></td>
            <td><?= htmlspecialchars($reserva['nome_usuario']) ?></td>
            <td><?= htmlspecialchars($reserva['nome_quarto']) ?></td>
            <td>R$ <?= number_format($reserva['valor'], 2, ',', '.') ?></td>
            <td><?= date("d/m/Y", strtotime($reserva['data'])) ?></td>
            <td>
              <a href="excluirReserva.php?id=<?= $reserva['id_reserva'] ?>" 
                 onclick="return confirm('Tem certeza que deseja excluir esta reserva?')">
                 ❌ Excluir
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</main>

<footer>
  <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
    Número de contato: (11) 1234-5678. Email: villasol@gmail.com
  </p>
</footer>

</body>
</html>
