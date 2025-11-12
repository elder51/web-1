<?php

require_once 'db.php';


$stmt = $pdo->query("SELECT * FROM REMEDIOS");

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
                <li><a href="../index.php">Home</a></li>
                <li><a href="index_remedio.php">Lista de Remedios</a></li>
                <li><a href="cadastro_remedios.php">Adicionar Remedio</a></li>
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
                        <td><?= $remedio['ID'] ?></td>
                        <td><?= $remedio['NOME'] ?></td>
                        <td><?= $remedio['FABRICANTE'] ?></td>
                        <td><?= $remedio['DESCRICAO'] ?></td>
                        <td><?= $remedio['PRECO'] ?></td>
                        <td><?= $remedio['ESTOQUE'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o remedio -->
                            <a href="read_remedios.php?ID=<?= $remedio['ID'] ?>">Visualizar</a>
                            <a href="update_remedios.php?ID=<?= $remedio['ID'] ?>">Editar</a>
                            <a href="delete_remedios.php?ID=<?= $remedio['ID'] ?>">Excluir</a>
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