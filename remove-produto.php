<?php include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");


$id = $_POST['id'];
removeproduto($conexao, $id);

// Após remover ele redireciona para página de listagem e se estiver "true" ele mostra mensagem de sucesso
header("Location: produto-lista.php?removido=true");
die();
?>

<?php include("rodape.php")?>;