<?php
require_once 'db.php';
require_once 'authenticate.php';

$stmt = $pdo->query("SELECT * FROM pacientes");
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
</head>
<body>
    <header>
        <h1>Lista de Pacientes</h1>
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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data Nascimento</th>
                    <th>tipo Sanguineo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $paciente['id'] ?></td>
                        <td><?= $paciente['nome'] ?></td>
                        <td><?= $paciente['data_nascimento'] ?></td>
                        <td><?= $paciente['tipo_sanguineo'] ?></td>
                        <td>
                            <a href="read_paciente.php?id=<?= $paciente['id'] ?>">Visualizar</a>
                            <a href="update_paciente.php?id=<?= $paciente['id'] ?>">Editar</a>
                            <a href="delete_paciente.php?id=<?= $paciente['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este paciente?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>