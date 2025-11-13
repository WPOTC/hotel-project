<?php
$titulo = "Suíte Master";
$descricao = " Tamanho: geralmente entre 40 m² e 60 m².
            Ambientes: quarto com cama queen ou king size, sala de estar, varanda e banheiro privativo.
            Comodidades: 
                Ar-condicionado.
                TV de tela plana com canais a cabo.
                Frigobar e cofre digital.
                Wi-Fi gratuito.
                Mesa de trabalho e área para refeições.
                Produtos de higiene pessoal gratuitos.
            Exemplos de comodidades adicionais: jacuzzi, sauna, cozinha privativa.
";
$valor = "3.500,00";
$imagens = <<<'HTML'

    <div class='slides'>
        <div class='slide'>

<img src='../uploads/quartos/banheiro-master.png' alt='Suíte Master' style='width:200px; margin:10px; border-radius:8px;'><br>

<img src='../uploads/quartos/master1.png' alt='Suíte Master' style='width:200px; margin:10px; border-radius:8px;'><br>

<img src='../uploads/quartos/master2.png' alt='Suíte Master' style='width:200px; margin:10px; border-radius:8px;'><br>

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
        <img src="img/logo-2.png" alt="">
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
            <button><a href="../View/quartos/EditarQuartos.php?id=11">Editar</a></button>
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