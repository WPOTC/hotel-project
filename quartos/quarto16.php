<?php
$titulo = "Suíte econômica";
$descricao = "Ambiente funcional e confortável.
            Cama queen size ou duas camas de solteiro.
            Banheiro privativo com amenidades básicas.
            TV de tela plana com canais a cabo.
            Ar-condicionado ou ventilador.
            Wi-Fi gratuito.
            Mesa de trabalho simples.
            Armário ou espaço para roupas.
            Serviço de limpeza diário.
            Decoração prática e minimalista.
            Chá e café disponíveis.
";
$valor = "400,00";
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