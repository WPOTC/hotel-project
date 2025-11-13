<?php
$titulo = "Suíte mais mais";
$descricao = "Ambiente ultra espaçoso e exclusivo.
            Cama king size extra larga com lençóis de algodão egípcio e travesseiros de pluma.
            Banheiro de luxo com banheira de hidromassagem, ducha dupla, sauna privativa e amenities de marcas premium.
            Sala de estar ampla com sofá de design, poltronas e lareira moderna.
            Sala de jantar particular com serviço de garçom exclusivo.
            Varanda ou terraço privativo com vista panorâmica deslumbrante.
            Sistema de som surround e TV de última geração com canais a cabo, streaming e controle por voz.
            Ar-condicionado com controle climático individual e purificador de ar.
            Wi-Fi ultra rápido e dedicado.
            Mini bar gourmet com bebidas premium e snacks finos.
            Máquina de café expresso profissional e utensílios para chá.
            Escritório completo com tecnologia de ponta (impressora, scanner, iluminação regulável).            	    Serviço de concierge 24 horas e mordomo particular.
            Decoração sofisticada com obras de arte exclusivas e design personalizado.
            Sistema de iluminação inteligente com diversas opções de ambiente.
            Amenidades exclusivas de spa e cuidados pessoais.
            Segurança reforçada e privacidade total.";
$valor = "2.400,00";
$imagens = <<<'HTML'
<img src='../uploads/quartos/banheiro-mais-mais.png' alt='Suíte mais mais' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/mais-mais1.png' alt='Suíte mais mais' style='width:200px; margin:10px; border-radius:8px;'><br><img src='../uploads/quartos/mais-mais2.png' alt='Suíte mais mais' style='width:200px; margin:10px; border-radius:8px;'><br>
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
        <button><a href="../View/reservadas/reserva/php">Editar</a></button>
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