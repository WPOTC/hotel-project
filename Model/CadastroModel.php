<?php

class UsuarioModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Buscar todos os usuários
    public function buscarTodosUsuarios() {
        $stmt = $this->pdo->query("SELECT * FROM cadastro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar um usuário pelo ID
    public function buscarUsuario($id) {
        $sql = "SELECT * FROM cadastro WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cadastrar novo usuário
    public function cadastrarUsuario($nome, $email, $cpf, $telefone, $senha) {
        if ($this->verificarEmailExistente($email)) {
            return false; // Já existe o email
        }

        $sql = "INSERT INTO cadastro (nome, email, cpf, telefone, senha) 
                VALUES (:nome, :email, :cpf, :telefone, :senha)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':cpf' => $cpf,
            ':telefone' => $telefone,
            ':senha' => $senha
        ]);
        return true;
    }

    // Verificar se o email já está cadastrado
    public function verificarEmailExistente($email) {
        $sql = "SELECT COUNT(*) FROM cadastro WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Editar usuário
    public function editarUsuario($nome, $email, $cpf, $telefone, $senha, $id) {
        $sql = "UPDATE cadastro 
                SET nome = ?, email = ?, cpf = ?, telefone = ?, senha = ? 
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $cpf, $telefone, $senha, $id]);
    }

    // Deletar usuário
    public function deletarUsuario($id) {
        $sql = "DELETE FROM cadastro WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    // Login do usuário
    public function loginUsuario($email, $senha) {
        $sql = "SELECT * FROM cadastro WHERE email = :email AND senha = :senha";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['id'] = $usuario['id'];
            return $usuario;
        }
        return null;
    }
}
// 1. Simulação dos dados da nova reserva
$tipo_quarto = 'Luxo';
$valor_diaria = 250.00; // Novo parâmetro para o preço

// 2. Chamada da função para registrar a reserva (Supondo que $usuarioModel é uma instância da classe)
$reserva_ok = $usuarioModel->reservar($tipo_quarto, $valor_diaria);

if ($reserva_ok) {
    // 3. Chamada da função para buscar e exibir os dados (incluindo o preço)
    $dados_reserva = $usuarioModel->exibirReserva($tipo_quarto);

    if ($dados_reserva) {
        echo "✅ Reserva de Quarto **" . $dados_reserva['reserva'] . "** realizada com sucesso!";
        echo "<br>💰 O preço da sua reserva é: **R$ " . number_format($dados_reserva['preco'], 2, ',', '.') . "**";
        // Você pode acessar todas as colunas, como $dados_reserva['id'], etc.
    }
} else {
    echo "❌ Não foi possível realizar a reserva. Talvez ela já exista.";
}









?>
