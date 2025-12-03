<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>Registro de Gerenciamentos de Remedios</h1>

        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="php/index_remedio.php">Lista de Remedios</a></li>
                    <li><a href="php/cadastro_remedios.php">Adicionar Remedio</a></li>
                    <li><a href="php/logout.php">Logout (<?= $_SESSION['user_name'] ?>)</a></li>
                <?php else: ?>
                    <li><a href="php/user_login.php">Login</a></li>
                    <li><a href="php/user_register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2>bem-vindo a atividade 6 crud basico - tema farmacia</h2>

        <p>ultilize o menu acima para navegação</p>
    </main>

    <footer>
        <p>&copy; 2025 - Sistema de Gerenciamento de Remedios</p>
    </footer>
</body>

</html>