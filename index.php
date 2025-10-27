<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Villa do Sol</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>

  <nav>
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
    </div>
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

        <p>Imagine acordar com o som suave dos pássaros, o aroma da mata fresca e uma vista que parece ter saído de um sonho. No Hotel Villa do Sol, o luxo é discreto, elegante e conectado à essência da natureza.

      🌸 Conforto e sofisticação: suítes espaçosas, decoradas com materiais naturais e toques rústicos que trazem aconchego e exclusividade.
      ☀️ Experiências únicas: banhos de piscina com vista para as montanhas, trilhas entre árvores centenárias e massagens com óleos orgânicos.
      🍷 Gastronomia refinada: pratos autorais feitos com ingredientes frescos, direto da horta para a sua mesa.
      🔥 Momentos inesquecíveis: lareiras acesas ao entardecer, jantares sob as estrelas e um ambiente que faz o tempo desacelerar.

      ✨ Hotel Villa do Sol — o refúgio perfeito entre o luxo e a natureza.
      📍 Reserve sua experiência e descubra o verdadeiro significado de bem-estar.</p>

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