<?php
require_once 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $query = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
    $query->execute([$id]);
    $produto = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<html>
<?php
if (!$produto) {
    echo "produto nao encontrado";
    exit;
}
?>

<form method="POST" action="alterar_produto_action.php">

    <label for="id">ID: </label>
    <input type="number" name="id" id="id" value="<?php echo $produto['id'] ?>" readonly><br>

    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome" value="<?php echo $produto['nome']; ?>"><br>

    <label for="preco">Preço: </label>
    <input type="text" name="preco" id="preco" value="<?php echo $produto['preco']; ?>"><br>

    <label for="descricao">Descrição: </label>
    <input type="text" name="descricao" id="descricao" value="<?php echo $produto['descricao']; ?>"><br>


    <input type="submit" value="Alterar Produto">
</form>

<a href="lista_produto.php"><button>Voltar</button></a>

</html>