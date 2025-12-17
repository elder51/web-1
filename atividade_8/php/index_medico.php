<?php
require_once 'db.php';
require_once 'authenticate.php';

$stmt = $pdo->query("SELECT medicos.*, usuarios.username FROM medicos LEFT JOIN usuarios ON medicos.usuario_id = usuarios.id");
$medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Medicos</title>
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento da clinica</h1>
        <nav>
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li>Medicos:
                    <a href="/php/create_Medico.php">Adicionar</a> |
                    <a href="/php/index_Medico.php">Listar</a>
                </li>
                <li>Pacientes:
                    <a href="/php/create_paciente.php">Adicionar</a> |
                    <a href="/php/index_paciente.php">Listar</a>
                </li>
                <li>Consultas:
                    <a href="/php/create_consulta.php">Adicionar</a> |
                    <a href="/php/index_consulta.php">Listar</a>
                </li>
                <li><a href="/php/logout.php">Logout (<?= $_SESSION['username'] ?>)</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Medicos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>usuario</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicos as $medico): ?>
                    <tr>
                        <td><?= $medico['id'] ?></td>
                        <td><?= $medico['nome'] ?></td>
                        <td><?= $medico['especialidade'] ?></td>
                        <td><?= $medico['username'] ?></td>
                        <td>
                            <a href="read_medico.php?id=<?= $medico['id'] ?>">Visualizar</a>
                            <a href="update_medico.php?id=<?= $medico['id'] ?>">Editar</a>
                            <a href="delete_medico.php?id=<?= $medico['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este medico?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento da Clinica</p>
    </footer>
</body>
</html>