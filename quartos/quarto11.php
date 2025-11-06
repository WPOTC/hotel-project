<?php
$titulo = "Suíte Presidencial";
$descricao = "Acomodação mais luxuosa e exclusiva do hotel.
            Ampla área com vários ambientes separados: 
            Sala de estar.
            Sala de jantar.
            Escritório.
            Closet.
            Cama king size.
            Banheiro com banheira de hidromassagem para duas pessoas.
            Cozinha completa (em alguns casos).
            Varanda com vista panorâmica (opcional).
            Serviços VIP e acesso a lounges exclusivos.
            Projetada para máximo conforto, privacidade e sofisticação.
            Ideal para ocasiões especiais e hóspedes que buscam experiência premium.";
$valor = "1.187,00";
$imagens = <<<'HTML'
<img src='../uploads/quartos/banheiro-presidencial-novo (1).png' alt='Suíte Presidencial' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/suite-presidencial.jpg' alt='Suíte Presidencial' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/suite-presidencial2.png.png' alt='Suíte Presidencial' style='width:200px; margin:10px; border-radius:8px;'><br>
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