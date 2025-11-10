<?php
$titulo = "João Augusto Mergulhão Rosa";
$descricao = "Tamanho: geralmente entre 40 m² e 60 m².
            Ambientes: quarto com cama queen ou king size, sala de estar, varanda e banheiro privativo.
            Comodidades: 
                Ar-condicionado.
                TV de tela plana com canais a cabo.
                Frigobar e cofre digital.
                Wi-Fi gratuito.
                Mesa de trabalho e área para refeições.
                Produtos de higiene pessoal gratuitos.
            Exemplos de comodidades adicionais: jacuzzi, sauna, cozinha privativa.";
$valor = "2.500,00";
$imagens = <<<'HTML'
<img src='../uploads/quartos/cinnanhe-removebg-preview.png' alt='João Augusto Mergulhão Rosa' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/Gemini_Generated_Image_8wnr5g8wnr5g8wnr.png' alt='João Augusto Mergulhão Rosa' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/Gemini_Generated_Image_fqj2yofqj2yofqj2.png' alt='João Augusto Mergulhão Rosa' style='width:200px; margin:10px; border-radius:8px;'><br>
HTML;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f9f9f9; }
        .container { background: white; padding: 20px; border-radius: 8px; width: 600px; }
        img { display: block; max-width: 100%; height: auto; }
    </style>
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

                    <li><a href="../index.php">INÍCIO</a></li>
                    <li><a href="../quartos.php">QUARTOS</a></li>
                    <li><a href="../sobre.php">SOBRE NÓS</a></li>

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