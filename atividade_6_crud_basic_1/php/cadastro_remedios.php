<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $descricao = $_POST['descricao'];
    $preco = str_replace(',', '.', $_POST['preco']);
    $estoque = $_POST['estoque'];
    
    $stmt = $pdo->prepare("INSERT INTO REMEDIOS (NOME, FABRICANTE, DESCRICAO, PRECO, ESTOQUE) VALUES (?, ?, ?, ?, ?)");
    
    $stmt->execute([$nome, $fabricante, $descricao, $preco, $estoque]);
    
    header('Location: index_remedio.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de remedios</title>
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
        <h2>Adicionar Remedio</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="fabricante">Fabricante:</label>
            <input type="text" id="fabricante" name="fabricante" required>
            
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>

            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" required>
            
            <button type="submit">Adicionar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 - Sistema de Gerenciamento de Remedios</p>
    </footer>
</body>
</html>