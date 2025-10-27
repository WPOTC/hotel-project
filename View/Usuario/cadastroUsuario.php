<?php



        if(isset($usuarios)){
            echo "Seja bem-vindo(a), " . htmlspecialchars($usuarios['nome']) . "!";
        }
        if(!isset($usuarios)){
            echo "<a href = 'View/Usuario/cadastrarUsuario.php'>Cadastre-se</a>";
            return;
        }


            
            echo "<div>";
            echo "<h1>Suas Informações</h1>";
            echo "<h3>Nome:</h3> " . SELECT from cadastro WHERE nome = $nome;
            echo "</div>";

                echo "<a href='View/Usuario/editar.php?id={$id}'>Editar</a>" ;
                echo "<a href='View/Usuario/deletar.php?id={$id}' onclick=\"return confirm('ur sure?')\">Deletar</a>";
     
        }
        

       
    

   

?>