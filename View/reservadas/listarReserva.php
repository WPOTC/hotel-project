<?php


   

       if(empty($Reserva)) {
        echo "<p>Nenhuma reserva realizada.</p>";
        return;

       }

        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><td><a href= 'View/Reservas/cadastrar.php'>Cadastrar</a></td></tr>";
        echo "<tr><th>hospedes</th><th>data</th></tr>";

        foreach($Reserva as $reserva) {
            echo "<tr>";
            echo "<td>{$Reservas['hospedes']}</td>";
            echo "<td>{$Reservas['data']}</td>";
            echo "<td>
                 <a href= 'View/Reservas/deletar.php?reserva={$reserva}' onclick=\"return confirm('Tem certeza que deseja excluir essa reserva?')\">(Imagem de X)</a> 
                 </td>" ;
                 echo "</tr>";
        }
     echo "</table>";
    
        
        
               
    

