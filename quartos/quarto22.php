<?php
$titulo = "teste professor";
$descricao = "11111";
$valor = "11111111111111";
$imagens = <<<'HTML'
<img src='../uploads/quartos/area_lazer.png' alt='teste professor' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/banheiro-casa-de-campo - Copia.jpg' alt='teste professor' style='width:200px; margin:10px; border-radius:8px;'><br>
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

<button><a href='../View/reservadas/reserva.php'>Agendar</a></button>
<br>
<a href="../index.php">⬅ Voltar à lista</a>
    </div>
</body>
</html>