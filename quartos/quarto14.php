<?php
$titulo = "Suíte Júnior";
$descricao = "Ambiente confortável e funcional.
            Cama queen size ou king size.
            Banheiro privativo com amenities essenciais.
            TV de tela plana com canais a cabo.
            Ar-condicionado com controle individual.
            Wi-Fi gratuito de alta velocidade.
            Área de estar integrada ao quarto (sofá ou poltrona).
            Mesa de trabalho compacta.
            Cofre digital para pertences pessoais.
            Decoração moderna e aconchegante.
            Serviço de limpeza diário.
            Chá e café disponíveis no quarto.";
$valor = "254,00";
$imagens = <<<'HTML'
<img src='../uploads/quartos/banheiro-junior.jpg' alt='Suíte Júnior' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/junior1.png' alt='Suíte Júnior' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/junior2.png' alt='Suíte Júnior' style='width:200px; margin:10px; border-radius:8px;'><br>
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