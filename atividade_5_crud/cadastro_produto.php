<html>
    <h1>
        atividade 5 Crud \ tema: Loja
    </h1>
    <form method="POST" action="cadastrar_produto_action.php">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome"><br>

        <label for="preco">Preço: </label>
        <input type="text" name="preco" id="preco"><br>

        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao"><br>

        <input type="submit" value="Cadastrar">
    </form>

    <a href="lista_produto.php"><button>Lista de Produtos</button></a>
</html>