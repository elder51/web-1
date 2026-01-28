<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clinica</title>
</head>

<body>
    <header>
        <h1>Sistema Clinica</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
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
                <?php else: ?>
                    <li><a href="/php/user_login.php">Login</a></li>
                    <li><a href="/php/user_register.php">Registrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>

    </header>

    <main>
        <h2>Bem-vindo ao Sistema de Gerenciamento da Clinica</h2>
        <p>Utilize o menu acima para navegar pelo sistema.</p>
    </main>

    <footer>
        <p>&copy; 2025 - Sistema de Gerenciamento da Clinica</p>
    </footer>
</body>

</html>