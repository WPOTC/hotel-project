<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Quarto</title>
</head>
<body>

  <h1>Cadastrar Novo Quarto</h1>

  <form action="salvar_quarto.php" method="post" enctype="multipart/form-data">
    <label>Nome do Quarto:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Preço:</label><br>
    <input type="number" name="preco" step="0.01" required><br><br>

    <label>Foto:</label><br>
    <input type="file" name="foto" accept="image/*" required><br><br>

    <input type="submit" value="Salvar Quarto">
  </form>

</body>
</html>

<?php


?>