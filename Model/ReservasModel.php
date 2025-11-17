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
    // 1. Verifica se já existe reserva para este quarto nesta data
    $sql = "SELECT COUNT(*) AS total 
            FROM reserva 
            WHERE id_quarto = :id_quarto 
              AND data = :data";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id_quarto', $id_quarto);
    $stmt->bindValue(':data', $data);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado['total'] > 0) {
        return [
            "status"  => false,
            "mensagem" => "O quarto já está reservado nesta data!"
        ];
    }

    // 2. Se não existir reserva → inserir
    $sql = "INSERT INTO reserva (data, id_quarto, id_usuario) 
            VALUES (:data, :id_quarto, :id_usuario)";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':id_quarto', $id_quarto);
    $stmt->bindValue(':id_usuario', $id_usuario);
}
   public function reserva($data, $id_quarto, $id_usuario)
{
    // Verifica se o quarto já está reservado nesta data
    $check = $this->pdo->prepare("
        SELECT * FROM reservas 
        WHERE id_quarto = :id_quarto 
          AND data = :data
    ");
    $check->bindValue(':id_quarto', $id_quarto);
    $check->bindValue(':data', $data);
    $check->execute();

    if ($check->rowCount() > 0) {
        return [
            "status"  => false,
            "mensagem" => "Este quarto já está reservado nesta data!"
        ];
    }

    // Caso não exista reserva, inserir:
    $stmt = $this->pdo->prepare("
        INSERT INTO reservas (data, id_quarto, id_usuario)
        VALUES (:data, :id_quarto, :id_usuario)
    ");

    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':id_quarto', $id_quarto);
    $stmt->bindValue(':id_usuario', $id_usuario);

    if ($stmt->execute()) {
        return [
            "status"  => true,
            "mensagem" => "Reserva realizada com sucesso!"
        ];
    } else {
        return [
            "status"  => false,
            "mensagem" => "Erro ao realizar a reserva!"
        ];
    }
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




}



?>