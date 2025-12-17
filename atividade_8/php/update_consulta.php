<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM consultas WHERE id = ?");
$stmt->execute([$id]);
$consulta = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $observacoes = $_POST['observacoes'];

    $stmt = $pdo->prepare("UPDATE consultas SET observacoes = ? WHERE id = ?");
    $stmt->execute([$observacoes, $id]);

    header('Location: read_consulta.php?id=' . $id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
</head>
<body>
    <header>
        <h1>Editar Consulta</h1>
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
            <label for="observacoes">Disciplina:</label>
            <input type="text" id="observacoes" name="observacoes" value="<?= $consulta['observacoes'] ?>" required>

            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>