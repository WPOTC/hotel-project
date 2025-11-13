<?php

class UsuarioModel{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // ... (As outras funções de usuário foram omitidas por brevidade, mas devem ser mantidas)

    //---
    //parte da reserva de quartos

    /**
     * Realiza uma reserva e inclui o preço.
     * @param string $reserva O tipo ou identificador da reserva.
     * @param float $preco O preço da reserva.
     * @return bool Retorna true em caso de sucesso ou false se a reserva já existir.
     */
    public function reservar($reserva, $preco) {
        // 1. Verifica se a reserva já existe (opcional, dependendo da sua lógica de negócio)
        $verificar = $this->verificarReservaExistente($reserva); 
        if ($verificar) {
            return false;
        } else {
            // 2. Insere a nova reserva, incluindo a coluna 'preco'
            // Assumindo a tabela 'reservas' e que 'reserva' é uma coluna
            $sql = "INSERT INTO reservas (reserva, preco) VALUES (:reserva, :preco)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':reserva' => $reserva, ':preco' => $preco]);
            return true;
        } 
    }

    /**
     * Exibe os detalhes de uma reserva, incluindo o preço.
     * @param string $reserva O tipo ou identificador da reserva.
     * @return array|false Retorna um array associativo da reserva ou false se não for encontrada.
     */
    public function exibirReserva($reserva){
        // 3. Consulta a reserva e retorna todas as colunas (incluindo o preço)
        // Usando prepared statement para segurança (SQL Injection)
        $sql = "SELECT * FROM reservas WHERE reserva = :reserva";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':reserva' => $reserva]);
        
        // Retorna a linha da reserva, que agora inclui a coluna 'preco'
        $dados_reserva = $stmt->fetch(PDO::FETCH_ASSOC);
        
       
        return $dados_reserva;
    }

    public function checkout($reserva){
        $sql = "DELETE from reservas WHERE reserva = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$reserva]);
    }

    public function listarTodasReservas($reserva, $nome){
        // Usando Prepared Statements e operador AND (corrigido do código anterior)
        $sql = "SELECT * FROM reservas WHERE nome = :nome AND reserva = :reserva";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':nome' => $nome, ':reserva' => $reserva]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarReservaExistente($reserva) {
        $sql = "SELECT COUNT(*) FROM reservas WHERE reserva = :reserva";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':reserva', $reserva);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

}

?>