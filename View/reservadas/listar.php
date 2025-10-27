<?php


   

       if(empty($Reservas)) {
        echo "<p>Nenhuma Reserva realizada.</p>";
        echo "<a href= 'View/Reservas/cadastrar.php'>Cadastrar</a>";
        return;

       }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href= 'View/Reservas/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>ID</th><th>data</th><th>hospedes</th><th>ocupacao</th></tr>";

        foreach($Reservas as $reservas) {
            $id = $Reservas['id'];
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$Reservas['data']}</td>";
            echo "<td>{$Reservas['hospedes']}</td>";
              echo "<td>{$Reservas['ocupacao']}</td>";
            echo "<td>
                 <a href= 'View/Reservas/editar.php?id={$id}'>Editar</a> | 
                 <a href= 'View/Reservas/deletar.php?id={$id}' onclick=\"return confirm('Tem ceretza que deseja excluir essa reserva?')\">Deletar</a> 
                 </td>" ;
                 echo "</tr>";
        }
     echo "</table>";
    
        
        
               
    

