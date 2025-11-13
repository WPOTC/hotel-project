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

        // 1️⃣ Cadastra no banco
        $idQuartos = $this->QuartosModel->cadastrarQuartos($nome_quarto, $descricao, $valor);

        if ($idQuartos) {

            // 2️⃣ Define a pasta para uploads das imagens
            $pastaUploads = "C:/Turma1/xampp/htdocs/hotel-project/uploads/quartos/";
            if (!is_dir($pastaUploads)) {
                mkdir($pastaUploads, 0777, true);
            }

            // 3️⃣ Salva as imagens
            $imagensSalvas = [];
            foreach ($imagens['tmp_name'] as $key => $tmp_name) {
                if ($tmp_name) {
                    $nomeOriginal = $imagens['name'][$key];
                    $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
                    $novoNome = uniqid("img_") . "." . $extensao;
                    $caminhoFinal = $pastaUploads . $novoNome;

                    if (move_uploaded_file($tmp_name, $caminhoFinal)) {
                        $caminhoRelativo = $novoNome;
                        $this->QuartosModel->salvarImagemQuarto($idQuartos, $caminhoRelativo);
                        $imagensSalvas[] = $caminhoRelativo;
                    }
                }
            }

            // 4️⃣ Cria o arquivo físico (quarto1.php, quarto2.php, etc.)
            $pastaQuartos = "C:/Turma1/xampp/htdocs/hotel-project/quartos/";
            if (!is_dir($pastaQuartos)) {
                mkdir($pastaQuartos, 0777, true);
            }

            // Descobre o número sequencial do novo arquivo
            $arquivosExistentes = glob($pastaQuartos . "quarto*.php");
            $numero = count($arquivosExistentes) + 1;
            $novoArquivo = $pastaQuartos . "quarto{$numero}.php";

            // Gera o conteúdo do novo arquivo
            $nomeEscapado = addslashes($nome_quarto);
            $descricaoEscapada = addslashes($descricao);
            $valorEscapado = addslashes($valor);

            // Cria HTML com as imagens adicionadas
            $htmlImagens = "";
            foreach ($imagens['name'] as $img) {
                $htmlImagens .= "<img src='../uploads/quartos/{$img}' alt='{$nomeEscapado}' style='width:200px; margin:10px; border-radius:8px;'><br>";
            }

            //$htmlImagensEscapado = addslashes($htmlImagens);


            $conteudo = <<<PHP
<?php
\$titulo = "{$nomeEscapado}";
\$descricao = "{$descricaoEscapada}";
\$valor = "{$valorEscapado}";
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
        body { font-family: Arial; margin: 40px; background: #f9f9f9; }
        .container { background: white; padding: 20px; border-radius: 8px; width: 600px; }
        img { display: block; max-width: 100%; height: auto; }
    </style>
    <link rel="stylesheet" href="../css/quarto-individual.css">
</head>
<script>
        document.querySelectorAll('.slider').forEach(slider => {
            const slidesContainer = slider.querySelector('.slides');
            const slides = slidesContainer.querySelectorAll('img');
            const next = slider.querySelector('.next');
            const prev = slider.querySelector('.prev');

            let index = 0;

            function showSlide(i) {
                index = (i +  slides.length) % slides.length;
                slidesContainer.style.transform = `translateX(-{index * 100}%)`;
            }

            next.addEventListener('click', () => showSlide(index + 1));
            prev.addEventListener('click', () => showSlide(index - 1));
        });

    </script>
<body>
     <nav>
        <div class="menulogo">
            <img src="../img/logo-2.png" alt="Logo Hotel Villa do Sol">
        </div>
        <div class="textos-nav">
            <h1>Hotel Villa do Sol</h1>
            <ul>
                <li><a href="../index.php">INÍCIO</a></li>
                <li><a href="../quartos.php">QUARTOS</a></li>
                <li><a href="../sobre.php">SOBRE NÓS</a></li>
            </ul>
        </div>
    </nav>

    <div class="voltar">
        <a href="../index.php"><img src="../img/logo-voltar.png" alt="Voltar"></a>
    </div>

    <div class="product-container">

        <div class="cont">
            <div class="left-box">
                <!-- SLIDER DE IMAGENS -->
                <div class="slider">
                    <div class="slides">
                        <?php echo \$imagens;?>
                    </div>
                    <button class="prev">❮</button>
                    <button class="next">❯</button>
                </div>
            </div>

            <div class="titulo-valor">
                <h1><?php echo \$titulo; ?></h1>
                <h3>R$ <?php echo \$valor;?></h3>
                <button><a href="../View/reservadas/reserva.php">Agendar</a></button>
            </div>
        </div>

        <div class="descricao">
            <h3>Descrição:</h3>
            <p><?php echo \$descricao; ?></p>
        </div>

    </div>

    <footer>
        <p>© 2025 Hotel Villa do Sol. Todos os direitos reservados.  
            Contato: (11) 1234-5678 | Email: villasol@gmail.com
        </p>
    </footer>

    

</body>

</html>
PHP;

            // Salva o arquivo físico
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