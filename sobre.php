<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sobre.css">
    <title>Hotel Villa do Sol</title>
</head>
<body>
<?php
session_start();
?>
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
          <li><a href="quartos.php">QUARTOS</a></li>
          <li><a href="sobre.php">SOBRE NÓS</a></li>
          <li><a href="checkout.php">RESERVAS</a></li>

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
            echo "<div class='usuario'><a href = 'View/Usuario/exibirUsuario.php'class='cadastro'><img src='img/logo-cadastro-feito.png'></a>" . "Seja bem-vindo(a), " . htmlspecialchars($_SESSION['nome']) . "!</div>";
        }elseif(!isset($_SESSION['nome'])){
            echo "<a href = 'View/Usuario/cadastrarUsuario.php' class='cadastro'><img src='img/logo-cadastro.png'></a>";
         
        }
        ?>
  </nav>

  <section class="banner">
  <img src="img/recepcao.png" alt="Hotel Villa do Sol">
</section>

<div class="bloco">
  <div class="texto">
    <p>
      Entre as montanhas encantadas de Gramado, nasceu um refúgio pensado para quem busca mais do que hospedagem — busca experiências que aquecem a alma.
      O Hotel Villa do Sol surgiu do sonho de unir luxo, natureza e simplicidade elegante, criando um espaço onde cada detalhe convida ao descanso e à contemplação.
      Inspirado nas vilas europeias e na beleza natural da Serra Gaúcha, o Villa do Sol foi construído com materiais rústicos e sustentáveis, preservando o charme da madeira, o toque da pedra e a luz dourada do entardecer. Tudo foi pensado para que o hóspede sinta o conforto de um lar e a magia de um paraíso escondido entre as araucárias.
    </p>
  </div>
</div>


<section class="banner2">
  <img src="img/area_lazer.png" alt="Vista externa do hotel">
</section>

<div class="bloco">
  <div class="texto">
    <p>
      Cada detalhe do Hotel Villa do Sol foi pensado para proporcionar uma experiência única — do aroma suave das flores no jardim até o som tranquilo da natureza ao amanhecer. 
      Aqui, o tempo desacelera, e o luxo se revela na simplicidade do conforto e na beleza da paisagem.
    </p>
  </div>
</div>

    

    <footer role="contentinfo">
  <div class="container">
    <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
        Número de contato: (11) 1234-5678. Email:villasol@gmail.com 
    </p>
  </div>
</footer>
</body>
</html>