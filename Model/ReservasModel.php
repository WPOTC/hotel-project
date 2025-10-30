<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/ReservasModel.php";
class ReservasModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM Reaservas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function cadastrar($data, $hospedes, $ocupacao) {
   $sql = "INSERT INTO Reservas (data, hospedes, 
   ocupacao, ) VALUES (:data, :hospedes, :ocupacao)";
   $stmt = $this->pdo->prepare($sql);
   return $stmt->execute([
    ':data' => $data,
    ':hospedes' => $hospedes,
    ':ocupacao' => $ocupacao
   

    ]);

}


public function buscarReservas($id){
  $stmt = $this->pdo->query("SELECT * FROM Reservas WHERE id = $id");
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function editar($data, $hospedes,$ocupacao, $id) {
  $sql = "UPDATE Reservas SET nome=?, tipo=?,  WHERE id=?";
  $stmt = $this->pdo->prepare($sql);
  return $stmt->execute([$data, $hospedes, $ocupacao,
   $id]);

    

}

public function deletarReservas($id) {
   $sql = "DELETE FROM Reservas WHERE id = ?";
   $stmt = $this->pdo->prepare($sql);
   return $stmt->execute([$id]);
  }

}