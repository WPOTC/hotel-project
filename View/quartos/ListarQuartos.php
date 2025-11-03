<?php


   

       if(empty($Quartos)) {
        echo "<p>Nenhuma Reserva realizada.</p>";
        echo "<a href= 'View/Reservas/cadastrar.php'>Cadastrar</a>";
        return;

       }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href= 'View/Quartos/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>nome</th><th>ocupacao</th><th>imagens</th></tr>";

        foreach($Quartos as $quartos) {
            $id = $Quartos['id'];
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$Quartos['nome']}</td>";
            echo "<td>{$Quartos['ocupacao']}</td>";
              echo "<td>{$Quartos['imagens']}</td>";
            echo "<td>
                 <a href= 'View/Quartos/editar.php?id={$id}'>Editar</a> | 
                 <a href= 'View/Quartos/deletar.php?id={$id}' onclick=\"return confirm('Tem ceretza que deseja excluir esse quarto?')\">Deletar</a> 
                 </td>" ;
                 echo "</tr>";
        }
     echo "</table>";
    