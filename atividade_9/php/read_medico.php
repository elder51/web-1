<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT medicos.*, usuarios.username FROM medicos LEFT JOIN usuarios ON medicos.usuario_id = usuarios.id WHERE medicos.id = ?");
$stmt->execute([$id]);
$medico = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Medico</title>
</head>
<body>
    <header>
        <h1>Detalhes do Medico</h1>
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
        <?php if ($medico): ?>
            <p><strong>ID:</strong> <?= $medico['id'] ?></p>
            <p><strong>Nome:</strong> <?= $medico['nome'] ?></p>
            <p><strong>Especialidade:</strong> <?= $medico['especialidade'] ?></p>
            <p><strong>Usuário Associado:</strong> <?= $medico['username'] ?></p>
            <p>
                <a href="update_medico.php?id=<?= $medico['id'] ?>">Editar</a>
                <a href="delete_medico.php?id=<?= $medico['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Medico não encontrado.</p>
        <?php endif; ?>
    </main>
</body>
</html>