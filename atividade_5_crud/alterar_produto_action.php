<?php 
    require_once 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = str_replace(',', '.', $_POST['preco']);
        $descricao = $_POST['descricao'];

        $query = $pdo->prepare("UPDATE produto SET nome = ?, preco = ?, descricao = ? WHERE id = ?");
        $query->execute([$nome, $preco, $descricao, $id]);

        echo "Dados do Produto Alterados com Sucesso!!";
    }


    echo "<a href='lista_produto.php'><button>Voltar</button></a>"
?>