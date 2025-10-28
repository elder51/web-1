<?php 
    require_once 'db.php';

    $id = $_GET['id'];

    $query = $pdo->prepare("DELETE FROM produto WHERE id = ?");
    $query->execute([$id]);

    echo "Produto excluido com sucesso!!";
    echo "<a href='lista_produto.php'><button>Voltar</button></a>";
?>