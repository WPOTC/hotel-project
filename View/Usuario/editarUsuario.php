<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/CadastroController.php";

session_start();
$UsuarioController = new UsuarioController($pdo);



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../../css/index.css">
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
      
        <?php
        if(isset($_SESSION['nome'])){
            echo "<a href = 'View/Usuario/exibirUsuario.php'>Imagem</a>" . "Seja bem-vindo(a), " . htmlspecialchars($_SESSION['nome']) . "!";
        }elseif(!isset($_SESSION['nome'])){
            echo "<a href = 'View/Usuario/cadastrarUsuario.php'>Cadastre-se</a>";
         
        }
        ?>
     
        </div>
  </nav>

    <a href="../../index.php">Voltar</a>

    


<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $usuario = $UsuarioController->buscarUsuario($id);
    ?>
    <form method="post">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" value="<?=$usuario['nome'];?>" required> <br>

    <label for="email">Email: </label>
    <input type="email" name="email" value="<?=$usuario['email'];?>" required> <br>

    <label for="cpf">CPF: </label>
    <input type="number" name="cpf" value="<?=$usuario['cpf'];?>" required> <br>

    <label for="telefone">Telefone: </label>
    <input type="number" name="telefone" value="<?=$usuario['telefone'];?>" required> <br>

    <label for="senha">Senha: </label>
    <input type="password" name="senha" value="<?=$usuario['senha'];?>" required> <br>

    <input type="submit" value="Salvar" onclick="return confirm('Tem certeza?')">
</form>
</body>
</html>

<?php
}else{
    header('Location: exibirUsuario.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    

    $UsuarioController->editarUsuario($nome , $email , $cpf , $telefone , $senha , $id);

    header('Location: ../../index.php');
}

?>