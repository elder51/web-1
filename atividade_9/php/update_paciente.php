<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM pacientes WHERE id = ?");

$stmt->execute([$id]);
$paciente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];
    $imagem_id = $paciente['imagem_id'];

    if (!empty($_FILES['imagem']['name'])) {
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid() . '.' . $extensao;
        $caminho = __DIR__ . '/../storage/' . $novoNome;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
            $stmt = $pdo->prepare("INSERT INTO imagens (path) VALUES (?)");
            $stmt->execute([$novoNome]);
            $imagem_id = $pdo->lastInsertId();
        }
    }

    $stmt = $pdo->prepare("UPDATE pacientes SET nome = ?, data_nascimento = ?, tipo_sanguineo = ?, imagem_id = ? WHERE id = ?");
    $stmt->execute([$nome, $data_nascimento, $tipo_sanguineo, $imagem_id, $id]);

    header('Location: read_paciente.php?id=' . $id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>

<body>
    <header>
        <h1>Editar Paciente</h1>
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
        <form method="POST" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $paciente['nome'] ?>" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" value="<?= $paciente['data_nascimento'] ?>" required>

            <label for="tipo_sanguineo">Tipo Sanguineo:</label>
            <select id="tipo_sanguineo" name="tipo_sanguineo" required>
                <option value="">Selecione o usuário</option>
                <option value="A+" <?= $paciente['tipo_sanguineo'] == 'A+' ? 'selected' : '' ?>>A+</option>
                <option value="A-" <?= $paciente['tipo_sanguineo'] == 'A-' ? 'selected' : '' ?>>A-</option>
                <option value="B+" <?= $paciente['tipo_sanguineo'] == 'B+' ? 'selected' : '' ?>>B+</option>
                <option value="B-" <?= $paciente['tipo_sanguineo'] == 'B-' ? 'selected' : '' ?>>B-</option>
                <option value="AB+" <?= $paciente['tipo_sanguineo'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
                <option value="AB-" <?= $paciente['tipo_sanguineo'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
                <option value="O+" <?= $paciente['tipo_sanguineo'] == 'O+' ? 'selected' : '' ?>>O+</option>
                <option value="O-" <?= $paciente['tipo_sanguineo'] == 'O-' ? 'selected' : '' ?>>O-</option>
            </select>

            <label for="imagem">Imagem de Perfil:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*">

            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>

</html>