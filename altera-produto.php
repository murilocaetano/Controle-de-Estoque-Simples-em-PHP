<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");


// Pega os dados enviados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];

// Verifica se existe algo na váriavel emestoque e retorna valor
if (array_key_exists('emestoque', $_POST)) {
	$emestoque = "true";
} else {
	$emestoque = "false";
}

// Mensagens de sucesso e erro
if(alteraproduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $emestoque)) { ?>
	<p class="text-success">Produto <?= $nome; ?>, foi alterado com sucesso!</p>
<?php } else { 
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">Lamentamos, algum tipo de erro aconteceu: o produto <?= $nome; ?>, <?= $msg; ?>não foi alterado.</p>

<?php
}
?>

<?php include("rodape.php");?>