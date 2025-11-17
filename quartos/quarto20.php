<?php
session_start();
$titulo = "SUÍTE MAIS MAIS";
$descricao = "Ambiente ultra espaçoso e exclusivo.<br>
            Cama king size extra larga com lençóis de algodão egípcio e travesseiros de pluma.<br>
            Banheiro de luxo com banheira de hidromassagem, ducha dupla, sauna privativa e amenities de marcas premium.<br>
            Sala de estar ampla com sofá de design, poltronas e lareira moderna.<br>
            Sala de jantar particular com serviço de garçom exclusivo.<br>
            Varanda ou terraço privativo com vista panorâmica deslumbrante.<br>
            Sistema de som surround e TV de última geração com canais a cabo, streaming e controle por voz.<br>
            Ar-condicionado com controle climático individual e purificador de ar.<br>
            Wi-Fi ultra rápido e dedicado.<br>
            Mini bar gourmet com bebidas premium e snacks finos.<br>
            Máquina de café expresso profissional e utensílios para chá.<br>
            Escritório completo com tecnologia de ponta (impressora, scanner, iluminação regulável). <br>           	   
            Decoração sofisticada com obras de arte exclusivas e design personalizado. <br>
            Serviço de concierge 24 horas e mordomo particular<br>
            Sistema de iluminação inteligente com diversas opções de ambiente.<br>
            Amenidades exclusivas de spa e cuidados pessoais.<br>
            Segurança reforçada e privacidade total.<br>";
$valor = "3.400,00";
$imagens = <<<'HTML'
<div class='slider'>
    <div class='slides'>

<img src='../uploads/quartos/mais-mais1.png' alt='Suíte mais mais' 
style=' margin:10px; border-radius:8px;'><br>

<img src='../uploads/quartos/mais-mais2.png' alt='Suíte mais mais' 
style=' margin:10px; border-radius:8px;'><br>

<img src='../uploads/quartos/banheiro-mais-mais.png' alt='Suíte mais mais' 
style=' margin:10px; border-radius:8px;'><br>
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

    <?php

if(isset($_SESSION['email']) && $_SESSION['email'] == 'v1ll4s0l@gmail.com'){
   echo '<nav>
    <div class="menu">

      <div class="menulogo">
        <img src="../img/logo-2.png" alt="">
      </div>

      <div class="textos-nav">
        <h1>Hotel Villa do Sol</h1>

        <ul>
          <li><a href="../index.php">INÍCIO</a></li>
          <li><a href="../quartos.php" class="quartos">QUARTOS</a></li>
          <li><a href="../sobre.php">SOBRE NÓS</a></li>
          <li><a href="../View/reservadas/listarReserva.php">RESERVAS</a></li>

        </ul>
      </div>
    </div>';
}else{
  echo '<nav>
    <div class="menu">

      <div class="menulogo">
        <img src="../img/logo-2.png" alt="">
      </div>

      <div class="textos-nav">
        <h1>Hotel Villa do Sol</h1>

        <ul>
          <li><a href="../index.php">INÍCIO</a></li>
          <li><a href="../quartos.php" class="quartos">QUARTOS</a></li>
          <li><a href="../sobre.php">SOBRE NÓS</a></li>

        </ul>
      </div>
    </div>';
}


    if(isset($_SESSION['nome'])){
            echo "<a href = '../View/Usuario/exibirUsuario.php' class='cadastro'><img src='../img/logo-cadastro-feito.png'</a>" . "Seja bem-vindo(a), " . htmlspecialchars($_SESSION['nome']) . "!";
        }elseif(!isset($_SESSION['nome'])){
            echo "<a href = '../View/Usuario/cadastrarUsuario.php'class='cadastro'><img src='../img/logo-cadastro.png'></a>";
         
        }
        ?>
  </nav>

                </ul>
            </div>
        </div>
    </nav>

    
    <a href="../quartos.php" ><img src="../img/logo-voltar.png"></a>

    <div class="product-container">

     <div class="cont">

        <div class="left-box">
            <?php echo $imagens; ?>
        </div>

        <div class="titulo-valor">
            <h1><?php echo $titulo; ?></h1>

            <h3> R$ <?php echo $valor; ?></h3>
            
            <div class="botoes">

            <button><a href="../View/reservadas/reserva/php">Agendar</a></button>
            
<?php        
if(isset($_SESSION['email']) && $_SESSION['email'] == 'v1ll4s0l@gmail.com'){   ?>
            <button><a href="../View/quartos/EditarQuartos.php?id=11">Editar</a></button>
            <?php } ?>
            </div>
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