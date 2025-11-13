<?php
require_once "C:/Turma1/xampp/htdocs/hotel-project/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/hotel-project/Controller/QuartosController.php";


// Instanciar o controller
$QuartosController = new QuartosController($pdo);

// Verificar se o ID foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Quartos = $QuartosController->buscarQuartos($id);

    if (!$Quartos) {
        die("Quarto não encontrado!");
    }

    // Se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];

        // Chama o método no controller com os parâmetros corretos
        $QuartosController->editarQuartos($nome, $descricao, $valor, $id);

        header("Location: ListarQuartos.php");
        exit;
    }
} else {
    header("Location: ListarQuartos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Quarto</title>
</head>
<body>
    <h1>Editar Quarto</h1>
    <form method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($Quartos['nome_quarto']) ?>" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" rows="6" cols="50" required><?= htmlspecialchars($Quartos['descricao']) ?></textarea><br><br>

        <label for="valor">Valor:</label><br>
        <input type="number" name="valor" step="0.01" value="<?= htmlspecialchars($Quartos['valor']) ?>" required><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
