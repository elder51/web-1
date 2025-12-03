<?php

require_once 'db.php';
require_once 'authenticate.php';


$stmt = $pdo->query("SELECT * FROM FARM_REMEDIOS");

$remedios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Remedios</title>
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
        <h2>Lista de Remedios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Fabricante</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre os alunos e cria uma linha para cada aluno na tabela -->
                <?php foreach ($remedios as $remedio): ?>
                    <tr>
                        <!-- Exibe os dados do remedio -->
                        <td><?= $remedio['REMD_ID'] ?></td>
                        <td><?= $remedio['REMD_NOME'] ?></td>
                        <td><?= $remedio['REMD_FABRICANTE'] ?></td>
                        <td><?= $remedio['REMD_DESCRICAO'] ?></td>
                        <td><?= $remedio['REMD_PRECO'] ?></td>
                        <td><?= $remedio['REMD_ESTOQUE'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o remedio -->
                            <a href="read_remedios.php?ID=<?= $remedio['REMD_ID'] ?>">Visualizar</a>
                            <a href="update_remedios.php?ID=<?= $remedio['REMD_ID'] ?>">Editar</a>
                            <a href="delete_remedios.php?ID=<?= $remedio['REMD_ID'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2025 - Sistema de Gerenciamento de Remedios</p>
    </footer>
</body>
</html>