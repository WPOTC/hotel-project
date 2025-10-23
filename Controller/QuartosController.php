<?php


require_once "C:/Turma1/xampp/htdocs/mvc/Model/QuartosModel.php";

class PagamentoController {  
  
    private $ProdutoModel;

   public function __construct($pdo) {
      $this->PagamentoModel = new PagamentoModel($pdo);
   }


   public function listar(){
    $pagamentos = $this->PagamentoModel->listar();
   include 'C:/Turma1/xampp/htdocs/mvc/View/Pagamento/ListarPagamento.php';
   return $pagamentos;
   }

   public function cadastrar($nome, $tipo, ) {
    return $this->PagamentoModel->cadastrar($nome, $tipo);
   }


public function editar ($nome, $tipo, $id){
   return $this->PagamentoModel->editar($nome, $tipo, $id);
}

public function buscarPagamento($id){
   return $this->PagamentoModel->buscarPagamento($id);
}

public function deletarPagamento($id){
   $pagamento = $this->PagamentoModel->deletarPagamento($id);
   return $pagamento;
}

}