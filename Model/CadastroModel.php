<?php

class UsuarioModel{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscarTodosUsuarios() {
        $stmt = $this->pdo->query("SELECT * FROM cadastro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarUsuario($id){
        $stmt = $this->pdo->query("SELECT *FROM cadastro WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrarUsuario($nome , $email , $cpf , $telefone , $senha){
        $sql = "INSERT INTO pagamento (nome, email, cpf, telefone, senha) VALUES (:nome, :email, :cpf, :telefone, :senha)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':nome' => $nome, ':email' => $email, ':cpf' => $cpf, ':telefone' => $telefone, ':senha' => $senha]);
    }

    public function editarUsuario($nome, $email,  $cpf, $telefone, $senha, $id){
        $sql = "UPDATE cadastro SET nome=? , email=? , cpf=? , telefone=? , senha=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $cpf, $telefone, $senha, $id]);
    }

    public function deletarUsuario($id){
        $sql = "DELETE from cadastro WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}

?>