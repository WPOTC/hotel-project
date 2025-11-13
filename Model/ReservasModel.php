<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/ReservasModel.php";
class ReservasModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM cadastro");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function reservar($id_usuario, $id_quarto, $data) {
    $sql = "INSERT INTO reserva (data, id_usuario, id_quarto) 
            VALUES (:data, :id_usuario, :id_quarto)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([
        ':data' => $data,
        ':id_usuario' => $id_usuario,
        ':id_quarto' => $id_quarto
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