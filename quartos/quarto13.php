<?php
$titulo = "Suíte Premium";
$descricao = "Ambiente espaçoso e elegante.
            Cama king size com roupa de cama de alta qualidade.
            Banheiro privativo com amenities de luxo.
            TV de tela plana com canais a cabo e streaming.
            Ar-condicionado com controle individual.
            Wi-Fi de alta velocidade gratuito.
            Área de estar confortável com poltronas ou sofá.
            Mini bar abastecido.
            Cofre digital para objetos de valor.
            Varanda ou janela panorâmica com vista privilegiada (quando aplicável).
            Serviço de quarto 24 horas.
            Máquina de café expresso ou chaleira elétrica.
            Mesa de trabalho com iluminação adequada.
            Decoração sofisticada e iluminação ambiente ajustável.
            Serviço de limpeza diário.
";
$valor = "570,00";
$imagens = <<<'HTML'
<img src='../uploads/quartos/banheiro-premium.jpg' alt='Suíte Premium' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/suite-premium.jpg' alt='Suíte Premium' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/suite-premium2.jpg' alt='Suíte Premium' style='width:200px; margin:10px; border-radius:8px;'><br>
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
    <div class="container">
        <h1><?php echo $titulo; ?></h1>
        <p><?php echo $descricao; ?></p>
        <p><b>Valor:</b> R$ <?php echo $valor; ?></p>
        <h3>Imagens:</h3>
<?php echo $imagens; ?>
<br>
<a href="../index.php">⬅ Voltar à lista</a>
    </div>
</body>
</html>