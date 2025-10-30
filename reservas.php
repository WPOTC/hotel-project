<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservar</title>
  <link rel="stylesheet" href="css/reservar.css">
</head>

<body>
  <nav>
    <div class="logo">

      <img src="img/logo-2.png" alt="Logo Villa do Sol">
    </div>
    <ul>
      <li><a href="index.php">INÍCIO</a></li>
      <li><a href="quartos.php">QUARTOS</a></li>
      <li><a href="sobre.php">SOBRE NÓS</a></li>
    </ul>
  </nav>

  <div>


    <section>
      <header>
        <img src="img/recepcao.png" alt="">
        <h1 class="cortitulo">Faça sua reserva</h1><br>
      </header>
      <form>

        Quantos hospedes viream: <input type="number" name="Quantidade" min="1" max="4" step="2"><br>

        Data de entrada: <input type="date" name="Data de entrada"><br>

        <p class="cortitulo">Data de saída:</p> <input type="date" name="Data de saída"><br>
        <input type="submit" value="Reservar">


      </form>
  </div>
  </section>
  <footer role="contentinfo">
    <div class="container">
      <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
        Número de contato: (11) 1234-5678. Email:villasol@gmail.com
      </p>
    </div>
  </footer>
</body>

</html>