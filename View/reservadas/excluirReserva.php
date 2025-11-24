<?php

$host = "localhost";
$dbname = "hotel";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco: " . $e->getMessage());
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $stmt = $pdo->prepare("DELETE FROM reserva WHERE id_reserva = $id");

    if ($stmt->execute()) {
        echo "<h3>✅ Reserva excluída com sucesso!</h3>";
        echo "<a href='listarReserva.php'>Voltar à lista de reservas</a>";
    } else {
        echo "<h3>❌ Erro ao excluir a reserva.</h3>";
    }
} else {
    echo "<h3>⚠️ Nenhum ID informado.</h3>";
}
?>
