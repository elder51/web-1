<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['ID'];

$stmt = $pdo->prepare("SELECT * FROM FARM_REMEDIOS WHERE REMD_ID = ?");

$stmt->execute([$id]);

$remedio = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $descricao = $_POST['descricao'];
    $preco = str_replace(',', '.', $_POST['preco']);
    $estoque = $_POST['estoque'];
    
    $stmt = $pdo->prepare("UPDATE FARM_REMEDIOS SET REMD_NOME = ?, REMD_FABRICANTE = ?, REMD_DESCRICAO = ?, REMD_PRECO = ?, REMD_ESTOQUE = ? WHERE REMD_ID = ?");
    
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
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="index_remedio.php">Lista de Remedios</a></li>
                    <li><a href="cadastro_remedios.php">Adicionar Remedio</a></li>
                    <li><a href="logout.php">Logout (<?= $_SESSION['user_name'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="user_login.php">Login</a></li>
                    <li><a href="user_register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar Remedio</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $remedio['REMD_NOME'] ?>" required>

            <label for="fabricante">Fabricante:</label>
            <input type="text" id="fabricante" name="fabricante" value="<?= $remedio['REMD_FABRICANTE'] ?>" required>
            
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" value="<?= $remedio['REMD_DESCRICAO'] ?>" required>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="<?= $remedio['REMD_PRECO'] ?>" required>

            <label for="estoque">Estoque:</label>
            <input type="number" id="estoque" name="estoque" value="<?= $remedio['REMD_ESTOQUE'] ?>" required>
            
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 - Sistema de Gerenciamento de Remedios</p>
    </footer>
</body>
</html>