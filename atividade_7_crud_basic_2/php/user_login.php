<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    // Verifica se o nome de usuário existe
    $stmt = $pdo->prepare("SELECT * FROM FARM_USUARIOS WHERE USER_NAME = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se a senha está correta
    if ($user && password_verify($password, $user['USER_PASSWORD'])) {
        $_SESSION['user_id'] = $user['USER_ID'];
        $_SESSION['user_name'] = $user['USER_NAME'];
        
        header('Location: /index.php');
    } else {
        echo "Nome de usuário ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>Registro de Gerenciamentos de Remedios</h1>

        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="index_remedio.php">Lista de Remedios</a></li>
                    <li><a href="cadastro_remedios.php">Adicionar Remedio</a></li>
                    <li><a href="logout.php">Logout (<?= $_SESSION['user_name'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="user_login.php">Login</a></li>
                    <li><a href="user_register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <h1>Login</h1>
    </header>

    <main>
        <form method="POST">
            <label for="user_name">Nome de Usuário:</label>
            <input type="text" id="user_name" name="user_name" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </main>

</body>

</html>