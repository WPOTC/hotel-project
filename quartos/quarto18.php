<?php
$titulo = "Casa de campo";
$descricao = "Ambiente rústico, acolhedor e espaçoso.
            Construção em madeira, pedra ou materiais naturais.
            Várias suítes com camas queen ou king size.
            Banheiros privativos com amenidades básicas a sofisticadas.
            Sala de estar ampla com lareira ou fogão a lenha.
            Cozinha equipada para uso completo (fogão, geladeira, micro-ondas, utensílios).
            Área externa com jardim, varanda e espaço para churrasco.
            Wi-Fi disponível.
            Área de jantar interna e externa.
            Vista para natureza, montanhas ou campo aberto.
            Espaços para lazer: churrasqueira, rede, piscina (quando aplicável).
            Decoração simples, rústica e aconchegante.
";
$valor = "1.800,00";
$imagens = <<<'HTML'
<img src='../uploads/quartos/banheiro-casa-de-campo.jpg' alt='Casa de campo' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/casa-de-campo.jpg' alt='Casa de campo' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/casa-de-campo2.jpg' alt='Casa de campo' style='width:200px; margin:10px; border-radius:8px;'><br>
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