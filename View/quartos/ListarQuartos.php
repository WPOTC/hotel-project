<?php

//require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
//require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/QuartosController.php";


// Cria o controlador
//$QuartosController = new QuartosController($pdo);

// Chama o método que lista os quartos
//$Quartos = $QuartosController->listarQuartos();

// Percorre e exibe os quartos
//foreach ($Quartos as $quarto) {
//    echo $quarto['id'] . "<br>";
//    echo $quarto['nome_quarto'] . "<br>";
//    echo $quarto['valor'] . "<br><br>";
//}




//require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/QuartosController.php";
//$QuartosControllerController = new QuartosController($pdo);

foreach ($Quartos as $quarto) {
  $id = $quarto['id'];
  echo "<img style='height: 200px;' src='uploads/quartos/".$quarto['caminho_imagem'] . "'><br>";
  echo $quarto['nome_quarto'] . "<br";
  echo $quarto['valor'] . "<br>";
}

//foreach($Quartos as $quartos) {
//    $id = $Quartos['id'];
//    echo "<tr>";
//    echo "<td>{$id}</td>";
//    echo "<td>{$Quartos['nome']}</td>";
//   echo "<td>{$Quartos['ocupacao']}</td>";
//      echo "<td>{$Quartos['imagens']}</td>";
//         echo "</tr>";
//  }
