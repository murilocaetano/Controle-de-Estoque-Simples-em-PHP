<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");


	$id = $_POST['id'];
	$produto = buscaproduto($conexao, $id);
	$categorias = listacategorias($conexao);

	// Checa se ele foi marcado como em estoque e se ele não estiver não marca a caixa
	$emestoque = $produto['emestoque'] ? "checked ='checked'" : "";

?>

<h1>Alterando Produto</h1>
</br>
	<form action="altera-produto.php" method="post">
	<input class="form-control" type="hidden" name="id" value="<?=$produto['id']?>">
	<table class="table">
		<tr>
			<td>Nome:</td>
			<td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"><br/></td>
		</tr>
		<tr>
			<td>Preço:</td>
			<td><input class="form-control" type="number" name="preco" value="<?=$produto['preco']?>"><br/></td>
		</tr>
		<tr>
			<td>Descrição:</td>
			<td><textarea class="form-control" name="descricao"><?=$produto['descricao']?></textarea><br/></td>
		</tr>
		<tr>
			<td>Status:</td>
			<td><input type="checkbox" name="emestoque" <?=$emestoque?> value="true"> Em estoque<br/></td>
		</tr>
		<tr>
			<td>Categoria:</td>
			<td>
				<select name="categoria_id" class="form-control" >
				<?php foreach ($categorias as $categoria) : 
				//Checa a categoria do produto e exibi como selecionado
					$essaEhaCategoria = $produto['categoria_id'] == $categoria['id'];
					$selecao = $essaEhaCategoria ? "selected='selected'" : "";
				?>
					<option value="<?=$categoria['id']?>" <?=$selecao?>>&nbsp;<?=$categoria['nome']?></option><br/>
				<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
			<button class="btn btn-primary" type="submit">Alterar</button>
			</td>
		</tr>
	</table>
	</form>	
<?php include("rodape.php")?>;
