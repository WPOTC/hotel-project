<?php
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/CadastroController.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";

$UsuarioController = new UsuarioController($pdo);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Villa do Sol</title>
  <link rel="stylesheet" href="../../css/reservar.css">
</head>
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<body>

  <footer>

    <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
      Número de contato: (11) 1234-5678. Email:villasol@gmail.com
    </p>

  </footer>
  <?php


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
          <li><a href="View/reservadas/listarReserva.php">RESERVAS</a></li>

        </ul>
      </div>';

    if (isset($_SESSION['nome'])) {
      echo "<div class='usuario'><a href = '../Usuario/exibir' class='cadastro'><img src='../../img/logo-cadastro-feito.png'></a>Seja bem-vindo(a),";
      echo $_SESSION['nome'] . "!</div>";
    } elseif (!isset($_SESSION['nome'])) {
      echo "<a href = 'View/Usuario/cadastrarUsuario.php' class='cadastro'><img src='img/logo-cadastro.png'></a>";

    }

    echo '</div></nav>';
  } else {
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
    </div></nav>';
  }

  if (empty($Reserva)) {
    echo "<div class='titulo'><p>Nenhuma reserva realizada.</p></div>";
    return;

  }

  echo "<div class=''><table border='1' cellpadding='5' cellspacing='0'>";
  echo "<tr><td><a href= 'View/Reservas/cadastrar.php'>Cadastrar</a></td></tr>";
  echo "<tr><th>hospedes</th><th>data</th></tr></div>";

  foreach ($Reserva as $reserva) {
    echo "<tr>";
    echo "<td>{$reserva['hospedes']}</td>";
    echo "<td>{$reserva['data']}</td>";
    echo "<td>
                 <a href= 'View/Reservas/deletar.php?reserva={$reserva}' onclick=\"return confirm('Tem certeza que deseja excluir essa reserva?')\">(Imagem de X)</a> 
                 </td>";
    echo "</tr>";
  }
  echo "</table>";

  ?>



  <script>
    document.querySelectorAll('.slider').forEach(slider => {
      const slidesContainer = slider.querySelector('.slides');
      const slides = slidesContainer.querySelectorAll('img');
      const next = slider.querySelector('.next');
      const prev = slider.querySelector('.prev');

      let index = 0;

      function showSlide(i) {
        index = (i + slides.length) % slides.length;
        slidesContainer.style.transform = `translateX(-${index * 100}%)`;
      }

      next.addEventListener('click', () => showSlide(index + 1));
      prev.addEventListener('click', () => showSlide(index - 1));
    });

  </script>

</body>

</html>