<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");?>

<h1>Produtos</h1>
</br>

<?php

// Se estiver removido e "true" ele mostra mensagem de sucesso
if ($_GET["removido"] && $_GET["removido"]=="true") {
?>
	<p class="alert-success"> Produto removido com sucesso.</p>

<?php
}

?>

<table class="table table-striped table-bordered">
	<?php
		// Mostra os produtos na na página
		$produtos = listaprodutos($conexao);
		foreach ($produtos as $produto) {
	?>
	<tr>
			<!-- Estrutura da listagem -->
			<td><?=$produto['nome'] ?></td>
			<td><?=$produto['preco'] ?></td>
			<td><?= substr($produto['descricao'], 0, 40) ?></td>
			<td><?= $produto['categoria_nome']?></td>
			<td>
				<form action="produto-altera-formulario.php" method="post">
					<input type="hidden" name="id" value="<?=$produto['id']?>">
					<button class="btn btn-primary">alterar</button>
			</form>
			</td>
			<td>
				<form action="remove-produto.php" method="post">
					<input type="hidden" name="id" value="<?=$produto['id']?>">
					<button class="btn btn-danger">remover</button>
				</form>
			</td>
	</tr>
	<?php
	}
	?>
</table>

<?php include("rodape.php");?>