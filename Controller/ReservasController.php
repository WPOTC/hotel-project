<?php


require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/ReservasModel.php";

class ReservasController {  
  
    private $ReservasModel;

   public function __construct($pdo) {
      $this->ReservasModel = new ReservasController($pdo);
   }


   public function listar(){
    $Reservas = $this->ReservasModel->listar();
   include 'C:/Turma1/xampp/htdocs/hotel-project/View/Reservas/ReservasPagamento.php';
   return $Reservas;
   }

   public function reservar($reserva ) {
    return $this->ReservasModel->reservar($reserva);
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