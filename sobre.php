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
$session_start();
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
            echo "<a href = 'View/Usuario/exibirUsuario.php'>Imagem</a>" . "Seja bem-vindo(a), " . htmlspecialchars($_SESSION['nome']) . "!";
        }elseif(!isset($_SESSION['nome'])){
            echo "<a href = 'View/Usuario/cadastrarUsuario.php'>Cadastre-se</a>";
         
        }
        ?>
  </nav>

  <div class="bloco">
  <div class="texto">
    <p>
      Entre as montanhas encantadas de Gramado, nasceu um refúgio pensado para quem busca mais do que hospedagem — busca experiências que aquecem a alma.
      O Hotel Villa do Sol surgiu do sonho de unir luxo, natureza e simplicidade elegante, criando um espaço onde cada detalhe convida ao descanso e à contemplação.
      Inspirado nas vilas europeias e na beleza natural da Serra Gaúcha, o Villa do Sol foi construído com materiais rústicos e sustentáveis, preservando o charme da madeira, o toque da pedra e a luz dourada do entardecer. Tudo foi pensado para que o hóspede sinta o conforto de um lar e a magia de um paraíso escondido entre as araucárias.
    </p>
  </div>
  <div class="imagem">
    <img src="img/recepcao.png" alt="Hotel Villa do Sol">
  </div>
</div>

<div class="bloco invertido">
  <div class="imagem">
    <img src="img/logo.png" alt="Hotel Villa do Sol">
  </div>
  <div class="texto">
    <p>
      Mais do que um hotel, somos um refúgio de bem-estar e autenticidade.
      Aqui, o tempo corre devagar, o som dos pássaros substitui o barulho da cidade, e cada pôr do sol revela um novo motivo para se encantar.
      Com uma equipe acolhedora e serviços personalizados, o Villa do Sol celebra o equilíbrio entre o rústico e o sofisticado, o natural e o refinado — uma experiência única, moldada pela tranquilidade e pelo calor da hospitalidade de Gramado.
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