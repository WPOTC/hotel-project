<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/ReservasModel.php";
class ReservasModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listar()
    {
        $stmt = $this->pdo->query("SELECT * FROM cadastro");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function reservar($data, $id_quarto, $id_usuario)
    {
        $sql = "INSERT INTO reserva (data, id_quarto, id_usuario ) 
            VALUES (:data, :id_quarto ,:id_usuario )";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':data' => $data,
            ':id_quarto' => $id_quarto,
            ':id_usuario' => $id_usuario
        ]);
    }



    public function buscarReservas($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM Reservas WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($data, $hospedes, $ocupacao, $id)
    {
        $sql = "UPDATE Reservas SET nome=?, tipo=?,  WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data,
            $hospedes,
            $ocupacao,
            $id
        ]);



    }

    public function deletarReservas($id)
    {
        $sql = "DELETE FROM Reservas WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
public function reservaExiste($data, $id_quarto, $id_usuario)
{
    $sql = "SELECT COUNT(*) FROM reservas 
            WHERE data = :data 
            AND id_quarto = :id_quarto 
            AND id_usuario = :id_usuario";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':id_quarto', $id_quarto);
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();

    return $stmt->fetchColumn() > 0; // retorna true se existir
}

public function reserva($data, $id_quarto, $id_usuario)
{
    // Impede duplicidade
    if ($this->reservaExiste($data, $id_quarto, $id_usuario)) {
        return false; // Já existe reserva igual
    }

    $sql = "INSERT INTO reservas (data, id_quarto, id_usuario)
            VALUES (:data, :id_quarto, :id_usuario)";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':id_quarto', $id_quarto);
    $stmt->bindParam(':id_usuario', $id_usuario);

    return $stmt->execute();
}

}



?>