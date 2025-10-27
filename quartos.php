<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/quartos.css">
    <title>Quartos</title>
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
            echo "<a href = 'View/Usuario/exibirUsuario.php'>Imagem</a>" . "Seja bem-vindo(a), " . htmlspecialchars($_SESSION['nome']) . "!";
        }elseif(!isset($_SESSION['nome'])){
            echo "<a href = 'View/Usuario/cadastrarUsuario.php'>Cadastre-se</a>";
         
        }
        ?>
  </nav>
    <h1>Quartos</h1>

                </ul>
            </div>
        </div>
    </nav>

    <div class="comeco">
        <h1>Quartos</h1>
<?php
if(isset($_SESSION['email']) && $_SESSION['email'] == 'v1ll4s0l@gmail.com'){
    echo " <a href='cadastrarquartos.php'>Cadastrar Quarto</a>";
}
?>
       
    </div>

    <div class="bloco1">

        <div class="slider">

            <h2>Suíte Presidencial</h2>

            <div class="slides">

                <img src="img/suite-presidencial.jpg" alt="" class="active">
                <img src="img/suite-presidencial2.png.png" alt="">
                <img src="img/banheiro-presidencial-novo (1).png" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 1.187,68</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

        <div class="slider">

            <h2>Suíte Master</h2>

            <div class="slides">

                <img src="img/master1.png" alt="" class="active">
                <img src="img/master2.png" alt="">
                <img src="img/banheiro-master.png" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 559,90</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

    </div>

    <div class="bloco2">

        <div class="slider">

            <h2>Suíte Premium </h2>

            <div class="slides">

                <img src="img/suite-premium.jpg" alt="" class="active">
                <img src="img/suite-premium2.jpg" alt="">
                <img src="img/banheiro-premium.jpg" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 570,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

        <div class="slider">

            <h2>Suíte Júnior</h2>

            <div class="slides">

                <img src="img/junior1.png" alt="" class="active">
                <img src="img/junior2.png" alt="">
                <img src="img/banheiro-junior.jpg" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 254,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

    </div>

    <div class="bloco3">

        <div class="slider">

            <h2>Suíte Spa</h2>

            <div class="slides">

                <img src="img/master2.jpg" alt="" class="active">
                <img src="img/spa2.jpg" alt="">
                <img src="img/banheiro-spa.jpg" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 999,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

        <div class="slider">

            <h2>Suíte econômica</h2>

            <div class="slides">

                <img src="img/suite-economica.jpg" alt="" class="active">
                <img src="img/suite-economica2.jpg" alt="">
                <img src="img/banheiro-suite-economica.jpg" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 400,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

    </div>

    <div class="bloco4">

        <div class="slider">

            <h2>Suíte Real</h2>

            <div class="slides">

                <img src="img/real1.png" alt="" class="active">
                <img src="img/real2.png" alt="">
                <img src="img/banheiro-real.png" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 390,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

        <div class="slider">

            <h2>Casa de campo</h2>

            <div class="slides">

                <img src="img/casa-de-campo.jpg" alt="" class="active">
                <img src="img/casa-de-campo2.jpg" alt="">
                <img src="img/banheiro-casa-de-campo.jpg" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 1.500,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

    </div>

    <div class="bloco5">

        <div class="slider">

            <h2>Suíte elegante</h2>

            <div class="slides">

                <img src="img/elegante2.png" alt="" class="active">
                <img src="img/elegante.png" alt="">
                <img src="img/banheiro-elegante.png" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 135,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

        <div class="slider">

            <h2>Suíte mais mais</h2>

            <div class="slides">

                <img src="img/mais-mais2.png" alt="" class="active">
                <img src="img/mais-mais1.png" alt="">
                <img src="img/banheiro-mais-mais.png" alt="">

            </div>

            <button class="prev">⟨</button>
            <button class="next">⟩</button>

            <h3>R$ 24.000,00</h3>

            <button type="submit" class="botao">Agendar</button>

        </div>

    </div>

    <div class="container">
        <footer role="contentinfo">
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

<?php


?>