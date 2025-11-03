<?php

require_once "C:/Turma1/xampp/htdocs/hotel-project/Model/QuartosModel.php";
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


public function cadastrarQuartos($nome_quarto, $descricao, $valor) {
    $sql = "INSERT INTO quartos (nome, descricao, valor) VALUES (:nome, :descricao, :valor)";
    $stmt = $this->pdo->prepare($sql);

    if ($stmt->execute([
        ':nome' => $nome_quarto,
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
  $sql = "UPDATE Quartos SET nome=?, descricao=?,  WHERE id=?";
  $stmt = $this->pdo->prepare($sql);
  return $stmt->execute([$nome, $descricao, 
   $id]);

    

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

}