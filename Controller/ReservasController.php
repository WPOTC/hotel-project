<?php


require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/ReservasModel.php";

class ReservasController
{

   private $ReservasModel;

   public function __construct($pdo)
   {
      $this->ReservasModel = new ReservasModel($pdo);
   }


   public function listar()
   {
      $Reservas = $this->ReservasModel->listar();
      include 'C:/Turma1/xampp/htdocs/hotel-project/View/Reservas/ReservasPagamento.php';
      return $Reservas;
   }

   public function reservar($data, $id_quarto , $id_usuario)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['email'])) {
        die("Usuário não logado!");
    }

    return $this->ReservasModel->reservar($data, $id_quarto, $id_usuario);
}



   public function editar($data, $hospedes, $ocupacao, $id)
   {
      return $this->ReservasModel->editar(
         $data,
         $hospedes,
         $ocupacao,
         $id
      );
   }

   public function buscarReservas($id)
   {
      return $this->ReservasModel->buscarReservas($id);
   }

   public function deletarReservas($id)
   {
      $Reservas = $this->ReservasModel->deletarReservas($id);
      return $Reservas;
   }
}
