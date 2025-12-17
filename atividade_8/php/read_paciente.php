<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM pacientes  WHERE pacientes.id = ?");
$stmt->execute([$id]);
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Paciente</title>
</head>
<body>
    <header>
        <h1>Detalhes do Paciente</h1>
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
        <?php if ($paciente): ?>
            <p><strong>ID:</strong> <?= $paciente['id'] ?></p>
            <p><strong>Nome:</strong> <?= $paciente['nome'] ?></p>
            <p><strong>Data Nascimento:</strong> <?= $paciente['data_nascimento'] ?></p>
            <p><strong>Tipo Sanguineo:</strong> <?= $paciente['tipo_sanguineo'] ?></p>
            <p>
                <a href="update_paciente.php?id=<?= $paciente['id'] ?>">Editar</a>
                <a href="delete_paciente.php?id=<?= $paciente['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Paciente não encontrado.</p>
        <?php endif; ?>
    </main>
</body>
</html>