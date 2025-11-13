<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/QuartosModel.php";

global $pdo;
class QuartosController
{

    private $QuartosModel;


    public function __construct($pdo)
    {
        $this->QuartosModel = new QuartosModel($pdo);
    }


    public function listarQuartos()
    {
        $Quartos = $this->QuartosModel->listarQuartos();
        include 'C:/Turma1/xampp/htdocs/hotel-project/View/quartos/ListarQuartos.php';
        return $Quartos;
    }
    
    public function listarQuartosComImagens()
    {
        $Quartos = $this->QuartosModel->listarQuartosComImagens();
        // include 'C:/Turma1/xampp/htdocs/hotel-project/View/quartos/ListarQuartos.php';
        return $Quartos;
    }

  public function cadastrarQuartos($nome_quarto, $descricao, $imagens, $valor)
{
    $resultado = false;

    // 1️⃣ Cadastra o quarto no banco
    $idQuartos = $this->QuartosModel->cadastrarQuartos($nome_quarto, $descricao, $valor);

    if ($idQuartos) {

        // 2️⃣ Define pasta de upload
        $pastaUploads = "C:/Turma1/xampp/htdocs/hotel-project/uploads/quartos/";
        if (!is_dir($pastaUploads)) {
            mkdir($pastaUploads, 0777, true);
        }

        // 3️⃣ Salva imagens com nomes únicos
        $imagensSalvas = [];
        foreach ($imagens['tmp_name'] as $key => $tmp_name) {
            if ($tmp_name) {
                $extensao = pathinfo($imagens['name'][$key], PATHINFO_EXTENSION);
                $novoNome = uniqid("img_") . "." . $extensao;
                $caminhoFinal = $pastaUploads . $novoNome;

                if (move_uploaded_file($tmp_name, $caminhoFinal)) {
                    $this->QuartosModel->salvarImagemQuarto($idQuartos, $novoNome);
                    $imagensSalvas[] = $novoNome;
                }
            }
        }

        // 4️⃣ Cria o arquivo do quarto (quarto1.php, quarto2.php, etc.)
        $pastaQuartos = "C:/Turma1/xampp/htdocs/hotel-project/quartos/";
        if (!is_dir($pastaQuartos)) {
            mkdir($pastaQuartos, 0777, true);
        }

        $arquivosExistentes = glob($pastaQuartos . "quarto*.php");
        $numero = count($arquivosExistentes) + 1;
        $novoArquivo = $pastaQuartos . "quarto{$numero}.php";

        // 5️⃣ Cria o HTML das imagens (como no modelo da suíte presidencial)
        $htmlImagens = "<div class='slider'>
    <div class='slides'>\n";
        foreach ($imagensSalvas as $img) {
            $htmlImagens .= "<img src='../uploads/quartos/{$img}' alt='{$nome_quarto}' 
 style=' margin:0px; border-radius:8px;'><br>\n";
        }
        $htmlImagens .= "    </div>

    <button class=\"prev\">⟨</button>
    <button class=\"next\">⟩</button>
</div>
<script>
        document.querySelectorAll('.slider').forEach(slider => {
            const slidesContainer = slider.querySelector('.slides');
            const slides = slidesContainer.querySelectorAll('img');
            const next = slider.querySelector('.next');
            const prev = slider.querySelector('.prev');

            let index = 0;

            function showSlide(i) {
                index = (i + slides.length) % slides.length;
                slidesContainer.style.transform = `translateX(-\${index * 100}%)`;
            }

            next.addEventListener('click', () => showSlide(index + 1));
            prev.addEventListener('click', () => showSlide(index - 1));
        });
</script>";

        // 6️⃣ Gera o conteúdo completo com o mesmo layout da Suíte Presidencial
        $conteudo = <<<PHP
<?php
\$titulo = "{$nome_quarto}";
\$descricao = "{$descricao}";
\$valor = "{$valor}";
\$imagens = <<<'HTML'
{$htmlImagens}
HTML;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?php echo \$titulo; ?></title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
            background: #f9f9f9;
        }

        img {
            display: block;
            height: auto;
            height: 50px;
            width: 50px;
            margin: 5px;
        }
    </style>
    <link rel="stylesheet" href="../css/quarto-individual.css">
</head>

<body>

    <?php
    session_start();

    if(isset(\$_SESSION['email']) && \$_SESSION['email'] == 'v1ll4s0l@gmail.com'){
       echo '<nav>
        <div class="menu">

          <div class="menulogo">
            <img src="../img/logo-2.png" alt="">
          </div>

          <div class="textos-nav">
            <h1>Hotel Villa do Sol</h1>

            <ul>
              <li><a href="../index.php">INÍCIO</a></li>
              <li><a href="../quartos.php" class="quartos">QUARTOS</a></li>
              <li><a href="../sobre.php">SOBRE NÓS</a></li>
              <li><a href="../View/reservadas/listarReserva.php">RESERVAS</a></li>
            </ul>
          </div>
        </div>';
    } else {
      echo '<nav>
        <div class="menu">
          <div class="menulogo">
            <img src="../img/logo-2.png" alt="">
          </div>
          <div class="textos-nav">
            <h1>Hotel Villa do Sol</h1>
            <ul>
              <li><a href="../index.php">INÍCIO</a></li>
              <li><a href="../quartos.php" class="quartos">QUARTOS</a></li>
              <li><a href="../sobre.php">SOBRE NÓS</a></li>
            </ul>
          </div>
        </div>';
    }

    if(isset(\$_SESSION['nome'])){
        echo "<a href='../View/Usuario/exibirUsuario.php' class='cadastro'><img src='../img/logo-cadastro-feito.png'></a> Seja bem-vindo(a), " . htmlspecialchars(\$_SESSION['nome']) . "!";
    } else {
        echo "<a href='../View/Usuario/cadastrarUsuario.php' class='cadastro'><img src='../img/logo-cadastro.png'></a>";
    }
    ?>
  </nav>

    <a href="../quartos.php"><img src="../img/logo-voltar.png"></a>

    <div class="product-container">

     <div class="cont">

        <div class="left-box">
            <?php echo \$imagens; ?>
        </div>

        <div class="titulo-valor">
            <button><a href="../View/quartos/EditarQuartos.php?id={$idQuartos}">Editar</a></button>
            <h1><?php echo \$titulo; ?></h1>

            <h3> R$ <?php echo \$valor; ?></h3>

            <button><a href="../View/reservadas/reserva.php">Agendar</a></button>
        </div>

    </div>

        <div class="descricao">

        <h3>Descrição: </h3>
            <p><?php echo \$descricao; ?></p>
        </div>
        <br>

    </div>

    <footer>
        <p>© 2025 Hotel Villa do Sol. Todos os direitos reservados.
            Número de contato: (11) 1234-5678. Email: villasol@gmail.com
        </p>
    </footer>
</body>

</html>
PHP;


        // 7️⃣ Salva o arquivo
        file_put_contents($novoArquivo, $conteudo);

        $_SESSION['mensagem'] = "✅ Quarto cadastrado e arquivo 'quarto{$numero}.php' criado com sucesso!";
        $resultado = true;
    } else {
        $_SESSION['mensagem'] = "❌ Erro ao cadastrar quarto.";
        $resultado = false;
    }

    return $resultado;
}


    public function editarQuartos($nome, $descricao, $valor, $id)
    {
        return $this->QuartosModel->editarQuartos(
            $nome,
            $descricao,
            $valor,
            $id
        );
    }

    public function buscarQuartos($id)
    {
        return $this->QuartosModel->buscarQuartos($id);
    }

    public function deletarQuartos($id)
    {
        $Quartos = $this->QuartosModel->deletarQuartos($id);
        return $Quartos;
    }








    public function reservar($reserva ) {
    $reservar = $this->QuartosModel->reservar($reserva);
    return $reservar;
   }

   public function exibirReserva($reserva){
        $reserva = $this->QuartosModel->exibirReserva($reserva);
        return $reserva;
    }

    public function listarTodasReservas(){
        $reservas = $this->QuartosModel->listarTodasReservas();
        include_once "C:/Turma1/xampp/htdocs/hotel-project/View/quarto/listarReserva.php";
        return;
    }

    public function checkout($reserva){
        $CHECKOUT = $this->QuartosModel->checkout($reserva);
        return $CHECKOUT;
    }

}







?>