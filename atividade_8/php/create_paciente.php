<?php
require_once 'db.php';
require_once 'authenticate.php';

$stmt = $pdo->query("SELECT id, username FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];

    $stmt = $pdo->prepare("INSERT INTO Pacientes (nome, data_nascimento, tipo_sanguineo) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $data_nascimento, $tipo_sanguineo]);

    header('Location: index_Paciente.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Paciente</title>
</head>

<body>
    <header>
        <h1>Adicionar Paciente</h1>
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
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="data_nascimento">Data Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <label for="tipo_sanguineo">Tipo Sanguineo:</label>
            <select id="tipo_sanguineo" name="tipo_sanguineo" required>
                <option value="">Selecione o tipo sanguineo</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>

</html>