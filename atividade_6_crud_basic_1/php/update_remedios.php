<?php
require_once 'db.php';

$id = $_GET['ID'];

$stmt = $pdo->prepare("SELECT * FROM REMEDIOS WHERE ID = ?");

$stmt->execute([$id]);

$remedio = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $descricao = $_POST['descricao'];
    $preco = str_replace(',', '.', $_POST['preco']);
    $estoque = $_POST['estoque'];
    
    $stmt = $pdo->prepare("UPDATE REMEDIOS SET NOME = ?, FABRICANTE = ?, DESCRICAO = ?, PRECO = ?, ESTOQUE = ? WHERE ID = ?");
    
    $stmt->execute([$nome, $fabricante, $descricao, $preco, $estoque, $id]);
    
    header('Location: index_remedio.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar remedio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Registro de Gerenciamentos de Remedios</h1>

        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index_remedio.php">Lista de Remedios</a></li>
                <li><a href="cadastro_remedios.php">Adicionar Remedio</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Remedio</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $remedio['NOME'] ?>" required>

            <label for="fabricante">Fabricante:</label>
            <input type="text" id="fabricante" name="fabricante" value="<?= $remedio['FABRICANTE'] ?>" required>
            
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" value="<?= $remedio['DESCRICAO'] ?>" required>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="<?= $remedio['PRECO'] ?>" required>

            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" value="<?= $remedio['ESTOQUE'] ?>" required>
            
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 - Sistema de Gerenciamento de Remedios</p>
    </footer>
</body>
</html>