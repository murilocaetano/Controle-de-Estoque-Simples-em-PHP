<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");

	$categorias = listacategorias($conexao);

?>

<h1>Adicionar Produto</h1>
</br>
	<form action="adiciona-produto.php" method="post">
	<table class="table">
		<tr>
			<td>Nome:</td>
			<td><input class="form-control" type="text" name="nome"><br/></td>
		</tr>
		<tr>
			<td>Preço:</td>
			<td><input class="form-control" type="number" name="preco"><br/></td>
		</tr>
		<tr>
			<td>Descrição:</td>
			<td><textarea class="form-control" name="descricao"></textarea><br/></td>
		</tr>
		<tr>
			<td>Status:</td>
			<td><input type="checkbox" name="emestoque" value="true"> Em estoque<br/></td>
		</tr>
		<tr>
			<td>Categoria:</td>
			<td>
				<select name="categoria_id" class="form-control" >
				<?php foreach ($categorias as $categoria) : ?>
					<option value="<?=$categoria['id']?>">&nbsp;<?=$categoria['nome']?></option><br/>
				<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
			<button class="btn btn-primary" type="submit">Cadastrar</button>
			</td>
		</tr>
	</table>
	</form>	
<?php include("rodape.php")?>;
