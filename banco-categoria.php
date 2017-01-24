<?php 
function listacategorias($conexao){
	$categorias = array();

	// Pega os dados do banco de dados da tabela produtos
    $query = "select * from categorias";
    $resultado = mysqli_query($conexao, $query);

    // Executa um loop pegando todos resultados da tabela
    while ($categoria = mysqli_fetch_assoc($resultado)) {
    	array_push($categorias, $categoria);
    }
	return $categorias;

}