<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT consultas.*, medicos.nome AS medico_nome, medicos.especialidade, pacientes.nome AS paciente_nome, pacientes.data_nascimento, pacientes.tipo_sanguineo FROM consultas LEFT JOIN medicos ON consultas.medico_id = medicos.id LEFT JOIN pacientes ON consultas.paciente_id = pacientes.id WHERE consultas.id = ?");
$stmt->execute([$id]);
$consulta = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Consulta</title>
</head>

<body>
    <header>
        <h1>Detalhes do Consulta</h1>
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
        <?php if ($consulta): ?>
            <p><strong>ID:</strong> <?= $consulta['id'] ?></p>
            <p><strong>Observações:</strong> <?= $consulta['observacoes'] ?></p>
            <p><strong>Data e Hora da Consulta:</strong> <?= $consulta['data_hora'] ?></p>
            <br>
            <p><strong>Medico Responsavel:</strong> <?= $consulta['medico_nome'] ?></p>
            <p><strong>Especialidade do Medico:</strong> <?= $consulta['especialidade'] ?></p>
            <br>
            <p><strong>Nome de Paciente:</strong> <?= $consulta['paciente_nome'] ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $consulta['data_nascimento'] ?></p>
            <p><strong>Tipo Sanguineo:</strong> <?= $consulta['tipo_sanguineo'] ?></p>
            <p>
                <a href="update_consulta.php?id=<?= $consulta['id'] ?>">Editar</a>
                <a href="delete_consulta.php?id=<?= $consulta['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Consulta não encontrado.</p>
        <?php endif; ?>
        </form>
    </main>
</body>

</html>