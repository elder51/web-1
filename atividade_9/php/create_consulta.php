<?php
require_once 'db.php';
require_once 'authenticate.php';

$stmt1 = $pdo->query("SELECT id, nome FROM medicos");
$medicos = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query("SELECT id, nome FROM pacientes");
$pacientes = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $observacoes = $_POST['observacoes'];
    $medico_id = $_POST['medico_id'];
    $paciente_id = $_POST['paciente_id'];

    $stmt = $pdo->prepare("INSERT INTO consultas (observacoes, data_hora, medico_id, paciente_id) VALUES (?, NOW(), ?, ?)");
    $stmt->execute([$observacoes, $medico_id, $paciente_id]);

    header('Location: index_consulta.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Consulta</title>
</head>
<body>
    <header>
        <h1>Adicionar Consulta</h1>
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
        <form method="POST">
            <label for="observacoes">Observações:</label>
            <input type="text" id="observacoes" name="observacoes" required>

            <label for="medico_id">Medico:</label>
            <select id="medico_id" name="medico_id" required>
                <option value="">Selecione o Medico</option>
                <?php foreach ($medicos as $medico): ?>
                    <option value="<?= $medico['id'] ?>"><?= $medico['nome'] ?></option>
                <?php endforeach; ?>
            </select>

            <label for="paciente_id">Paciente:</label>
            <select id="paciente_id" name="paciente_id" required>
                <option value="">Selecione o Paciente</option>
                <?php foreach ($pacientes as $paciente): ?>
                    <option value="<?= $paciente['id'] ?>"><?= $paciente['nome'] ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>
</html>