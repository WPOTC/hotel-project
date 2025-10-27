<?php


require_once "C:/Turma1/xampp/htdocs/mvc/Model/QuartosModel.php";

class QuartosController {  
  
    private $QuartosModel;

   public function __construct($pdo) {
      $this->QuartosModel = new QuartosModel($pdo);
   }


   public function listar(){
    $Quartos = $this->QuartosModel->listar();
   include 'C:/Turma1/xampp/htdocs/mvc/View/quartos/ListarQuartos.php';
   return $Quartos;
   }

   public function Cadastrar(	$nome,	$descricao,	$imagens
 ) { $resultado = false;

    $idQuartos = $this->QuartosModel->Cadastrar($nome, $descricao, $imagens);

    if ($idQuartos) {
        // Processar upload das imagens
        $pasta = "C:/Turma1/xampp/htdocs/divineshop/uploads/" ;
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        foreach ($imagens['tmp_name'] as $key => $tmp_name) {
            $nomeOriginal = $imagens['name'][$key];
            $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
            $novoNome = uniqid("img_") . "." . $extensao;
            $caminhoFinal = $pasta . $novoNome;

            if (move_uploaded_file($tmp_name, $caminhoFinal)) {
                // Salvar caminho da imagem no banco de dados
               $caminhoRelativo = "uploads/" . $novoNome;
               $this->QuartosModel->salvarImagem($idQuartos, $caminhoRelativo);
               $resultado = true;
            }
        }
   
   }

   $_SESSION['mensagem'] =  "Quarto cadastrado com sucesso!" ;

   $_SESSION['mensagem'] = "Erro ao cadastrar quarto.";
    
    return $resultado;
}

public function editar ($nome,	$descricao,	 $id){
   return $this->QuartosModel->editar($nome, $descricao, 
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

