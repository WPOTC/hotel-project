<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/quarto-individual.css">
</head>

<body>
    <nav>
        <div class="menu">

            <div class="menulogo">
                <img src="../img/logo-2.png" alt="">
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

    <h2>Suíte Presidencial</h2>

    <div class="conteudo">

<div class="slider">

        <div class="slides">

            <img src="../img/suite-presidencial.jpg" alt="" class="active">
            <img src="../img/suite-presidencial2.png.png" alt="">
            <img src="../img/banheiro-presidencial-novo (1).png" alt="">

        </div>

        <button class="prev">⟨</button>
        <button class="next">⟩</button>

        


    </div>

    <div class="texto-quarto">
  
        <h3>R$ 1.187,68</h3>


        <p>
            Acomodação mais luxuosa e exclusiva do hotel. <br>
            Ampla área com vários ambientes separados: <br>
            Sala de estar. <br>
            Sala de jantar. <br>
            Escritório. <br>
            Closet. <br>
            Cama king size. <br>
            Banheiro com banheira de hidromassagem para duas pessoas. <br>
            Cozinha completa (em alguns casos). <br>
            Varanda com vista panorâmica (opcional). <br>
            Serviços VIP e acesso a lounges exclusivos. <br>
            Projetada para máximo conforto, privacidade e sofisticação. <br>
            Ideal para ocasiões especiais e hóspedes que buscam experiência premium. <br>

            <button type="submit">Agendar</button>
        </p>
    
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