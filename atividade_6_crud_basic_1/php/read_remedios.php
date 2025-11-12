<?php
    require_once 'db.php';

    $id = $_GET['ID'];

    $stmt = $pdo->prepare("SELECT * FROM REMEDIOS WHERE ID = ?");
    $stmt->execute([$id]);

    $remedio = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe do Remedio</title>
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
        <h2>Detalhes do Remedio</h2>
        <?php if ($remedio): ?>
            <p><strong>ID:</strong> <?= $remedio['ID'] ?></p>
            <p><strong>Nome:</strong> <?= $remedio['NOME'] ?></p>
            <p><strong>Fabricante:</strong> <?= $remedio['FABRICANTE'] ?></p>
            <p><strong>Descrição:</strong> <?= $remedio['DESCRICAO'] ?></p>
            <p><strong>Preço:</strong> <?= $remedio['PRECO'] ?></p>
            <p><strong>Estoque:</strong> <?= $remedio['ESTOQUE'] ?></p>

            <p>
                <a href="update_remedios.php?ID=<?= $remedio['ID'] ?>">Editar</a>
                <a href="delete_remedios.php?ID=<?= $remedio['ID'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Remedio não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 - Sistema de Gerenciamento de Remedios</p>
    </footer>
</body>
</html>