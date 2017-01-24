<?php include ("conecta.php");
include ("banco-usuario.php");

// verifica o dados do enviados no banco de dados e exibi a mensagem correspondente
$usuario = buscaUsuario($conexao, $_POST['email'], $_POST['senha']);
if($usuario == null) {
	header("Location: index.php?login=0");
} else {
	header("Location: index.php?login=1");
	setcookie("usuario_logado", $usuario["email"], time() + 60);
}
die();