<?php


require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/QuartosModel.php";

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
        include 'C:/Turma1/xampp/htdocs/mvc/View/quartos/ListarQuartos.php';
        return $Quartos;
    }

    public function cadastrarQuartos($nome_quarto, $descricao, $imagens, $valor)
    {
        $resultado = false;

        // 1️⃣ Cadastra no banco
        $idQuartos = $this->QuartosModel->cadastrarQuartos($nome_quarto, $descricao, $valor);

        if ($idQuartos) {

            // 2️⃣ Define a pasta para uploads das imagens
            $pastaUploads = "C:/Turma1/xampp/htdocs/divineshop/uploads/";
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
                        $caminhoRelativo = "uploads/" . $novoNome;
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
</head>
<body>
    <div class="container">
        <h1><?php echo \$titulo; ?></h1>
        <p><?php echo \$descricao; ?></p>
        <p><b>Valor:</b> R\$ <?php echo \$valor; ?></p>
        <h3>Imagens:</h3>
<?php echo \$imagens; ?>
<br>
<a href="../index.php">⬅ Voltar à lista</a>
    </div>
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

    public function editarQuartos($nome, $descricao, $id)
    {
        return $this->QuartosModel->editarQuartos(
            $nome,
            $descricao,
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

}

