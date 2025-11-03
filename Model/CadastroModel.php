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
        $verifica = $this->verificarEmailExistente($email);
        if ($verifica) {
          return false;
            
        }else{
        $sql = "INSERT INTO cadastro (nome, email, cpf, telefone, senha) VALUES (:nome, :email, :cpf, :telefone, :senha)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nome' => $nome, ':email' => $email, ':cpf' => $cpf, ':telefone' => $telefone, ':senha' => $senha]);
        return true;
        }  

    }

    public function verificarEmailExistente($email) {
        $sql = "SELECT COUNT(*) FROM cadastro WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
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

    public function loginUsuario($email, $senha) {
    $sql = "SELECT * FROM cadastro WHERE email = :email AND senha = :senha";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        session_start();
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['id'] = $usuario['id'];

        return $usuario;
    } else {
        return null;
    }
}





//parte da reserva de quartos

public function reservar($reserva) {

   $verificar = $this->verificarReservaExistente($reserva);
        if ($verificar) {
          return false;
            
        }else{
        $sql = "INSERT INTO cadastro (reserva) VALUES (:reserva)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':reserva' => $reserva]);
        return true;
        }  

    }








public function exibirReserva($reserva){
        $stmt = $this->pdo->query("SELECT *FROM cadastro WHERE reserva = $reserva");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function checkout($reserva){
        $sql = "DELETE from cadastro WHERE reserva = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$reserva]);
    }

    public function listarTodasReservas($reserva, $nome){
        $stmt = $this->pdo->query("SELECT *FROM cadastro WHERE nome = $nome & reserva = $reserva");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarReservaExistente($reserva) {
        $sql = "SELECT COUNT(*) FROM cadastro WHERE reserva = :reserva";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':reserva', $reserva);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

}


?>