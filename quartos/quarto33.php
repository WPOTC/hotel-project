<?php
$titulo = "Suíte elegante";
$descricao = " Ambiente sofisticado e refinado.
            Cama king size ou queen size com roupa de cama premium.
            Banheiro privativo com acabamento em mármore e amenities de alta qualidade.
            TV de tela plana com canais a cabo e sistema de som ambiente.
            Ar-condicionado com controle individual.
            Wi-Fi de alta velocidade gratuito.
            Área de estar com poltronas confortáveis e mesa de centro.
            Iluminação suave e decorativa para ambiente acolhedor.
            Cofre digital para pertences pessoais.
            Mini bar bem abastecido.
            Mesa de trabalho elegante com boa iluminação.
            Decoração clássica e atemporal com detalhes em madeira ou tecido sofisticado.
            Serviço de limpeza diário.
            Serviço de quarto 24 horas disponível.
";
$valor = "135,00";
$imagens = <<<'HTML'
<img src='../uploads/quartos/banheiro-elegante.png' alt='Suíte elegante' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/elegante.png' alt='Suíte elegante' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/elegante2.png' alt='Suíte elegante' style='width:200px; margin:10px; border-radius:8px;'><br>
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