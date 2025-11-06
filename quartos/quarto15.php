<?php
$titulo = "Suíte Spa";
$descricao = "Ambiente amplo e relaxante.
            Cama king size com roupa de cama premium.
            Banheiro privativo com banheira de hidromassagem ou jacuzzi.
            Área exclusiva para tratamentos de spa dentro da suíte.
            Sauna ou steam room privativo (em algumas unidades).
            Amenidades de spa de alta qualidade (óleos essenciais, sais de banho, velas aromáticas).
            TV de tela plana com canais a cabo e streaming.
            Ar-condicionado com controle individual.
            Wi-Fi de alta velocidade gratuito.
            Área de estar confortável com sofá ou poltronas.
            Mini bar com opções saudáveis e refrescantes.
            Máquina de café expresso ou chaleira elétrica.
            Serviço de quarto 24 horas.
            Decoração zen com iluminação suave e elementos naturais.
            Serviço de massagens e tratamentos disponíveis sob demanda.
            Varanda ou janela com vista relaxante (quando aplicável).
";
$valor = "999,00";
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