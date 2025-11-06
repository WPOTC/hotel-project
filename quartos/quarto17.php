<?php
$titulo = "Suíte Real";
$descricao = "Ambiente extremamente espaçoso e luxuoso.
            Cama king size com roupa de cama de altíssima qualidade.
            Banheiro privativo com banheira de hidromassagem, duchas separadas e amenities de luxo.
            Sala de estar ampla e elegante com móveis sofisticados.
            Sala de jantar privativa.
            TV de tela plana grande com canais a cabo e sistema de som premium.
            Ar-condicionado com controle individual.
            Wi-Fi de alta velocidade gratuito.
            Varanda ou terraço privativo com vista panorâmica (quando disponível).
            Mini bar completo e adega de vinhos.
            Cofre digital para objetos de valor.
            Área de trabalho ampla com iluminação especial.
            Serviço de quarto 24 horas e concierge personalizado.
            Decoração refinada com detalhes em materiais nobres (madeira, mármore, etc.).
            Amenidades exclusivas de spa e beleza.
            Sistema de iluminação ambiente ajustável.
            Serviço de limpeza e arrumação várias vezes ao dia.
";
$valor = "390,00";
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
        
        <a href="../index.php">⬅ Voltar à lista</a>
    </div>
</body>
</html>