<?php
function  listaprodutos($conexao){

	$produtos = array();

	// Pega os dados do banco de dados da tabela produtos e junta as tabelas produtos e categoria eo campo ID da tabela categoria seja igual campo ID categorias_ID
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");

	// executa um loop pegando todos resultados da tabela
	while ($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

// Pega os dados enviados e insere no banco de dados
function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $emestoque) {
	$query = "insert into produtos (nome, preco, descricao, categoria_id, emestoque) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$emestoque})";
	return mysqli_query($conexao, $query);
}

// Pega os dados enviados e atualiza no banco de dados
function alteraproduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $emestoque) {
	$query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, emestoque = {$emestoque} where id = {$id}";
	return mysqli_query($conexao, $query);
}

// Recebe o ID, busca o produto e retorna o valor
function buscaproduto($conexao, $id){
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);

}

// Deleta o produto da tabela produtos pelo ID
function removeproduto($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}