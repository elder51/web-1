<?php 
    require_once "db.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $preco = str_replace(',', '.', $_POST['preco']);
        $descricao = $_POST['descricao'];

        $stmt = $pdo->prepare("INSERT INTO produto (nome, preco, descricao) VALUES (?,?,?)");
        $stmt->execute([$nome, $preco, $descricao]);
        
        $id_produto = $pdo->lastInsertId();


        echo "O produto $nome foi cadastrado com sucesso!! <br>";
        echo "<a href='cadastro_produto.php'><button>Cadastrar outro Produto</button></a>";
    } else{

    }
?>