<?php
require_once 'db.php';

echo "<button><a href='cadastro_produto.php'>Cadastrar Produto</a></button> <br>";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    $query = $pdo->query("
            SELECT produto.id, produto.nome, produto.preco, produto.descricao 
            FROM produto
        ");

    $produtos = $query->fetchAll(PDO::FETCH_ASSOC);


    if (!$produtos) {
        echo "<H1>Nâo existe nenhum produto ainda</H1>";
    } else {
        foreach ($produtos as $produto) {
            echo "<span>ID: </span>" .  $produto['id'] .
                " | <span>Nome: </span>" . $produto['nome'] .
                " | <span>Preço: </span>" . $produto['preco'] .
                " | <span>Descrição: </span>" . $produto['descricao'] .

                " <a href='excluir_produto.php?id=" . $produto['id'] . "'><button>Exluir Produto</button></a> " .
                " <a href='alterar_produto.php?id=" . $produto['id'] . "'><button>Alterar Produto</button></a><br> ";
        }
    }
}
