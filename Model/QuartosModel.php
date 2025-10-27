<?php

require_once "C:/Turma1/xampp/htdocs/mvc/Model/QuartosModel.php";
class QuartosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM Quastos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function cadastrar($nome, $descricao, $imagens) {
   $sql = "INSERT INTO Quartos (data, nome,	descricao, 
   imagens, ) VALUES (:nome, :descricao, :imagens)";
   $stmt = $this->pdo->prepare($sql);
   return $stmt->execute([
    ':nome' => $nome,
    ':descricao' => $descricao,
    ':imagens' => $imagens
   

    ]);

}


public function buscarQuartos($id){
  $stmt = $this->pdo->query("SELECT * FROM Quartos WHERE id = $id");
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function editar($nome, $descricao, $id) {
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

  public function salvarImagem($Quartos_id, $caminho) {
    $sql = "INSERT INTO Quartos_Imagens (Quartos_id, caminho_imagem) VALUES (?, ?)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([ $Quartos_id, $caminho]);
  }

}