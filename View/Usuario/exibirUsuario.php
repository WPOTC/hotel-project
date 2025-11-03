<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/CadastroController.php";


$UsuarioController = new UsuarioController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $usuario = $UsuarioController->buscarUsuario($_SESSION['id']);
   
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../css/exibir.css">
</head>
<body>

 <nav>
    <div class="menu">

      <div class="menulogo">
        <img src="../../img/logo-2.png" alt="">
      </div>
      <div class="textos-nav">
        <h1>Hotel Villa do Sol</h1>
        </div>

 <a href="../../index.php" class="cadastro"><img src="../../img/logo-voltar.png" alt=""></a>
     
        </div>
  </nav>

 
<h1 class="titulo-info">Suas informações</h1>

<div class="info-usuario">
  <?php
    $usuario = $UsuarioController->buscarUsuario($_SESSION['id']);
  ?>

  <table class="tabela-info">
    <tr>
      <th>Nome:</th>
      <td><?= htmlspecialchars($usuario['nome']) ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?= htmlspecialchars($usuario['email']) ?></td>
    </tr>
    <tr>
      <th>CPF:</th>
      <td><?= htmlspecialchars($usuario['cpf']) ?></td>
    </tr>
    <tr>
      <th>Telefone:</th>
      <td><?= htmlspecialchars($usuario['telefone']) ?></td>
    </tr>
    <tr>
      <th>Senha:</th>
      <td><?= htmlspecialchars($usuario['senha']) ?></td>
    </tr>
  </table>

  <div class="botoes-usuario">
    <a href="editarUsuario.php?id=<?= $_SESSION['id'] ?>" class="btn editar">Editar</a>
    <a href="logout.php" class="btn sair" onclick="return confirm('Tem certeza?')">Sair da Conta</a>
    <a href="excluirUsuario.php" class="btn deletar" onclick="return confirm('Tem certeza? Após isso, você perderá todas as suas reservas')">Deletar Conta</a>
  </div>
</div>
    <footer>
    <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
        Número de contato: (11) 1234-5678. Email:villasol@gmail.com 
    </p></footer>
  </div>
</body>
</html>