<?php


require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/QuartosModel.php";

class QuartosController {  
  
    private $QuartosModel;

   public function __construct($pdo) {
      $this->QuartosModel = new QuartosModel($pdo);
   }


   public function listarQuartos(){
    $Quartos = $this->QuartosModel->listarQuartos();
   include 'C:/Turma1/xampp/htdocs/mvc/View/quartos/ListarQuartos.php';
   return $Quartos;
   }

   public function cadastrarQuartos($nome_quarto, $descricao, $imagens, $valor) {
    $resultado = false;

    $idQuartos = $this->QuartosModel->cadastrarQuartos($nome_quarto, $descricao, $valor);

    if ($idQuartos) {
        $pasta = "C:/Turma1/xampp/htdocs/divineshop/uploads/";
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        foreach ($imagens['tmp_name'] as $key => $tmp_name) {
            if ($tmp_name) {
                $nomeOriginal = $imagens['name'][$key];
                $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
                $novoNome = uniqid("img_") . "." . $extensao;
                $caminhoFinal = $pasta . $novoNome;

                if (move_uploaded_file($tmp_name, $caminhoFinal)) {
                    $caminhoRelativo = "uploads/" . $novoNome;
                    $this->QuartosModel->salvarImagemQuarto($idQuartos, $caminhoRelativo);
                }
            }
        }

        $_SESSION['mensagem'] = "Quarto cadastrado com sucesso!";
        $resultado = true;
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar quarto.";
        $resultado = false;
    }

    return $resultado;
}
public function editarQuartos($nome,	$descricao,	 $id){
   return $this->QuartosModel->editarQuartos($nome, $descricao, 
   $id);
}

public function buscarQuartos($id){
   return $this->QuartosModel->buscarQuartos($id);
}

public function deletarQuartos($id){
   $Quartos = $this->QuartosModel->deletarQuartos($id);
   return $Quartos;
}

}

