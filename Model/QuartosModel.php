<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
class QuartosModel {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarQuartos() {
        $stmt = $this->pdo->query("SELECT * FROM quartos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function listarQuartosComImagens() {
        $stmt = $this->pdo->query("SELECT 
                q.id,
                q.nome_quarto,
                q.valor,
                q.descricao,
                qi.caminho_imagem
            FROM quartos q
            INNER JOIN quartos_imagens qi ON q.id = qi.quartos_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function cadastrarQuartos($nome_quarto, $descricao, $valor ) {
    $sql = "INSERT INTO quartos (nome_quarto, descricao, valor) VALUES (:nome_quarto, :descricao, :valor)";
    $stmt = $this->pdo->prepare($sql);

    if ($stmt->execute([
        ':nome_quarto' => $nome_quarto,
        ':descricao' => $descricao,
        ':valor' => $valor
    ])) {
        // Retorna o ID do quarto recém-criado
        return $this->pdo->lastInsertId();
    } else {
        return false;
    }
}


public function buscarQuartos($id){
  $stmt = $this->pdo->query("SELECT * FROM Quartos WHERE id = $id");
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function editarQuartos($nome, $descricao, $valor, $id) {
    $sql = "UPDATE quartos 
            SET nome_quarto = ?, descricao = ?, valor = ? 
            WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$nome, $descricao, $valor, $id]);
}

public function deletarQuartos($id) {
   $sql = "DELETE FROM Quartos WHERE id = ?";
   $stmt = $this->pdo->prepare($sql);
   return $stmt->execute([$id]);
  }

  public function salvarImagemQuarto($Quartos_id, $caminho) {
    $sql = "INSERT INTO quartos_imagens (quartos_id, caminho_imagem) VALUES (?, ?)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$Quartos_id, $caminho]);
  }



//parte da reserva



  public function reservar($reserva) {

   $verificar = $this->verificarReservaExistente($reserva);
        if ($verificar) {
          return false;
            
        }else{
        $sql = "INSERT INTO quartos (reserva) VALUES (:reserva)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':reserva' => $reserva]);
        return true;
        }  

    }








public function exibirReserva($reserva){
        $stmt = $this->pdo->query("SELECT *FROM quartos WHERE reserva = $reserva");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function checkout($reserva){
        $sql = "DELETE from quartos WHERE reserva = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$reserva]);
    }

    public function listarTodasReservas($reserva, $nome_quarto){
        $stmt = $this->pdo->query("SELECT *FROM quartos WHERE nome_quarto = $nome_quarto & reserva = $reserva");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarReservaExistente($reserva) {
        $sql = "SELECT COUNT(*) FROM quartos WHERE reserva = :reserva";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':reserva', $reserva);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

}