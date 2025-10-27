<?php


require_once "C:/Turma1/xampp/htdocs/mvc/Model/QuartosModel.php";

class QuartosController {  
  
    private $ReservasModel;

   public function __construct($pdo) {
      $this->ReservasModel = new ReservasController($pdo);
   }


   public function listar(){
    $Reservas = $this->ReservasModel->listar();
   include 'C:/Turma1/xampp/htdocs/mvc/View/Reservas/ReservasPagamento.php';
   return $Reservas;
   }

   public function cadastrar(	$data,	$hospedes,	$ocupacao	
 ) {
    return $this->ReservasModel->cadastrar($data, $hospedes, $ocupacao);
   }


public function editar ($data,	$hospedes,	$ocupacao, $id){
   return $this->ReservasModel->editar($data, $hospedes, 
   $ocupacao,
               $id);
}

public function buscarReservas($id){
   return $this->ReservasModel->buscarReservas($id);
}

public function deletarReservas($id){
   $Reservas = $this->ReservasModel->deletarReservas($id);
   return $Reservas;
}

}