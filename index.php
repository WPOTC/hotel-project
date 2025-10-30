<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Villa do Sol</title>
  <link rel="stylesheet" href="css/index.css">
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

  <div class="conteudo">

    <!-- Primeiro slider -->
    <div class="bloco1">

      <div class="slider">

        <div class="slides">
          <img src="img/hotel_frente.png" class="active">
          <img src="img/hotel1.png">
        </div>

        <button class="prev">⟨</button>
        <button class="next">⟩</button>

      </div>

      <div class="texto">

        <p>Respire fundo. Ouça o som dos pássaros e sinta o toque da brisa suave entre as árvores. Aqui, o tempo
          desacelera e o luxo se revela em cada detalhe. Villa do Sol – o seu refúgio natural de elegância e paz.</p>

        <p>Villa do Sol – Onde o luxo encontra a natureza. Descubra um refúgio exclusivo entre o verde e o dourado do
          pôr do sol. Chalés de madeira, conforto cinco estrelas e uma experiência que brilha com a energia do paraíso.
          Villa do Sol — viva o luxo em sua forma mais natural.</p>

      </div>

    </div>

    <!-- Segundo slider -->
    <div class="bloco2">

      <div class="slider">

        <div class="slides">
          <img src="img/recepcao.png" class="active">
          <img src="img/area_lazer.png">
        </div>

        <button class="prev">⟨</button>
        <button class="next">⟩</button>

      </div>

      <div class="texto">

        <p>Entre montanhas e jardins exuberantes, o Villa do Sol é um refúgio de elegância e tranquilidade.
      Cada detalhe foi pensado para oferecer conforto, sofisticação e uma conexão genuína com a natureza.
      Nossas suítes combinam design rústico e toques modernos, criando o equilíbrio perfeito entre aconchego e requinte.
      Desfrute de jantares à luz de velas, piscinas cercadas por verde e momentos de puro relaxamento.
      Aqui, o tempo desacelera e o silêncio se transforma em poesia.
      Viva o luxo natural, onde cada amanhecer é um convite à paz.</p>
     <p>Hotel Villa do Sol — seu refúgio entre o céu e a terra.</p>

      </div>

    </div>

  </div>

  <footer class="footer-simple" role="contentinfo">
    <div class="container">
      <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
        Número de contato: (11) 1234-5678. Email:villasol@gmail.com
      </p>
    </div>
  </footer>

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