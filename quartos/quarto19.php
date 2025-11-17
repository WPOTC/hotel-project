<?php
session_start();
$titulo = "SUÍTE ELEGANTE";
$descricao = "Ambiente sofisticado e refinado.<br>
            Cama king size ou queen size com roupa de cama premium.<br>
            Banheiro privativo com acabamento em mármore e amenities de alta qualidade.<br>
            TV de tela plana com canais a cabo e sistema de som ambiente.<br>
            Ar-condicionado com controle individual.<br>
            Wi-Fi de alta velocidade gratuito.<br>
            Área de estar com poltronas confortáveis e mesa de centro.<br>
            Iluminação suave e decorativa para ambiente acolhedor.<br>
            Cofre digital para pertences pessoais.<br>
            Mini bar bem abastecido.<br>
            Mesa de trabalho elegante com boa iluminação.<br>
            Decoração clássica e atemporal com detalhes em madeira ou tecido sofisticado<br>.
            Serviço de limpeza diário.<br>
            Serviço de quarto 24 horas disponível.<br>";
$valor = "1.900,00";
$imagens = <<<'HTML'
<div class='slider'>
    <div class='slides'>

<img src='../uploads/quartos/elegante.png' alt='Suíte elegante'
 style=' margin:0px; border-radius:8px;'><br>

<img src='../uploads/quartos/elegante2.png' alt='Suíte elegante'
 style=' margin:0px; border-radius:8px;'><br>

<img src='../uploads/quartos/banheiro-elegante.png' alt='Suíte elegante' 
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

             <button><a href="../View/reservadas/reserva.php">Agendar</a></button>
            
            <button><a href="../View/quartos/EditarQuartos.php?id=11">Editar</a></button>
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