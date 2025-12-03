<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['ID'];

$stmt = $pdo->prepare("SELECT * FROM FARM_REMEDIOS WHERE REMD_ID = ?");
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
        <h2>Detalhes do Remedio</h2>
        <?php if ($remedio): ?>
            <p><strong>ID:</strong> <?= $remedio['REMD_ID'] ?></p>
            <p><strong>Nome:</strong> <?= $remedio['REMD_NOME'] ?></p>
            <p><strong>Fabricante:</strong> <?= $remedio['REMD_FABRICANTE'] ?></p>
            <p><strong>Descrição:</strong> <?= $remedio['REMD_DESCRICAO'] ?></p>
            <p><strong>Preço:</strong> <?= $remedio['REMD_PRECO'] ?></p>
            <p><strong>Estoque:</strong> <?= $remedio['REMD_ESTOQUE'] ?></p>

            <p>
                <a href="update_remedios.php?ID=<?= $remedio['REMD_ID'] ?>">Editar</a>
                <a href="delete_remedios.php?ID=<?= $remedio['REMD_ID'] ?>">Excluir</a>
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