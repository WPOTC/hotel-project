<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Villa do Sol</title>
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

        <a href="../../index.php">Voltar</a>
     
        </div>
  </nav>
   
    <div>

    <h1>Login</h1>

       <form method="post">

        <label for="email">Email: </label>
        <input type="email" name="email" required><br><br>
    
        <label for="senha">Senha: </label>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Login">
    </form>

    <p>Não possuí uma conta Ainda? </p>
    <a href="cadastrarUsuario.php">Cadastre-se</a>
    </div>

<footer class="footer-simple" role="contentinfo">
    <div class="container">
      <p>© 2025 Hotel Villa do Sol . Todos os direitos reservados.
        Número de contato: (11) 1234-5678. Email:villasol@gmail.com
      </p>
    </div>
  </footer>

</body>
</html>

<?php
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/CadastroController.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";

$UsuarioController = new UsuarioController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  
  $email = $_POST['email'];
 
  $senha = $_POST['senha'];
 


  $UsuarioController -> loginUsuario($email,$senha);

  header('Location: ../../index.php');
}
?>