<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/CadastroController.php";

session_start();
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

  <h1>Suas informações:</h1>


<?php

$usuario = $UsuarioController->buscarUsuario($_SESSION['id']);
echo "<h3>Nome:</h3> " . htmlspecialchars($usuario['nome']) ;
echo "<h3>Email:</h3> " . htmlspecialchars($usuario['email']) ;
echo "<h3>CPF:</h3> " . htmlspecialchars($usuario['cpf']) ;
echo "<h3>Telefone:</h3> " . htmlspecialchars($usuario['telefone']) ;
echo "<h3>Senha:</h3> " . htmlspecialchars($usuario['senha']) ;


echo "<br><br>";


echo "<button><a href='editarUsuario.php?id={$_SESSION['id']}'>Editar</a> </button>";
echo "<button><a href='logout.php' onclick=\"return confirm('Tem certeza?')\">Sair da Conta</a></button>";


echo "<button><a href='excluirUsuario.php' onclick=\"return confirm('Tem certeza? Após isso, você perderá todas as suas reservas')\">Deletar Conta</a></button>";
?>

    
</body>
</html>

<?php






?>