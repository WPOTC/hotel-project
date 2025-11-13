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
<img src='../uploads/quartos/banheiro-master.png' alt='Suíte Master' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/master1.png' alt='Suíte Master' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/master2.png' alt='Suíte Master' style='width:200px; margin:10px; border-radius:8px;'><br>
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