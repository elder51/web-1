<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user_name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("SELECT * FROM FARM_USUARIOS WHERE USER_NAME = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        echo "Usuário já existe!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO FARM_USUARIOS (USER_NAME, USER_PASSWORD) VALUES (?, ?)");
        if ($stmt->execute([$username, $password])) {
            echo "Usuário registrado com sucesso!";
            header('Location: user_login.php');
        } else {
            echo "Erro ao registrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <li><a href="/index.php">Voltar ao Home</a></li>
        <h1>Registrar Usuário</h1>
    </header>
    <main>
        <form method="POST">
            <label for="user_name">Nome de Usuário:</label>
            <input type="text" id="user_name" name="user_name" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrar</button>
        </form>
    </main>

</body>
</html>