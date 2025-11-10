<?php
$titulo = "SUÍTE PRESIDENCIAL";
$descricao = "Acomodação mais luxuosa e exclusiva do hotel. <br>
            Ampla área com vários ambientes separados: <br>
            Sala de estar.<br>
            Sala de jantar.<br>
            Escritório.<br>
            Closet.<br>
            Cama king size.<br>
            Banheiro com banheira de hidromassagem para duas pessoas.<br>
            Cozinha completa (em alguns casos).<br>
            Varanda com vista panorâmica (opcional).<br>
            Serviços VIP e acesso a lounges exclusivos.<br>
            Projetada para máximo conforto, privacidade e sofisticação.<br>
            Ideal para ocasiões especiais e hóspedes que buscam experiência premium.<br>";
$valor = "1.187,00";
$imagens = <<<'HTML'
<div class='slider'>
    <div class='slides'>
        
<img src='../uploads/quartos/suite-presidencial.jpg' alt='Suíte Presidencial' 
 style=' margin:0px; border-radius:8px;'><br> 
 
 <img src='../uploads/quartos/suite-presidencial2.png.png' alt='Suíte Presidencial'
  style=' margin:0px; border-radius:8px;'><br>

<img src='../uploads/quartos/banheiro-presidencial-novo (1).png' alt='Suíte Presidencial'
 style=' margin:0px; border-radius:8px;'><br>

    </div>

    <button class="prev">⟨</button>
    <button class="next">⟩</button>

</div>
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
HTML;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
            background: #f9f9f9;
        }

        img {
            display: block;
            height: auto;
            height: 50px;
             width: 50px;
             margin: 5px;
        }
    </style>
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
    
    <div class="voltar">
    <a href="../index.php" ><img src="../img/logo-voltar.png"></a>
    </div>

    <div class="product-container">

     <div class="cont">

        <div class="left-box">
            <?php echo $imagens; ?>
        </div>

        <div class="titulo-valor">
            <h1><?php echo $titulo; ?></h1>

            <h3> R$ <?php echo $valor; ?></h3>

            <button><a href="../View/reservadas/reserva/php">Agendar</a></button>
        </div>
    
    </div>

        <div class="descricao">

        <h3>Descrição: </h3>
            <p><?php echo $descricao; ?></p>
        </div>
        <br>

    </div>

    <footer >
            <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
                Número de contato: (11) 1234-5678. Email:villasol@gmail.com
            </p>
    
    </footer>
</body>

</html>