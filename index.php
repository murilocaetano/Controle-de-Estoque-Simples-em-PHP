<?php include("cabecalho.php");?>
<!-- Mensagens de login -->
<?php if(isset($_GET["login"]) && $_GET["login"]==true) { ?>
	<p class="alert-success">Logado com sucesso!</p>
<?php } ?>
<?php if(isset($_GET["login"]) && $_GET["login"]==false) { ?>
	<p class="alert-danger">Usuário ou senha inválida!</p>
<?php } ?>

<h1>Bem-vindo!</h1>
</br>
<!-- Verifica o Cookie e mostra o usuário e se já estiver logado esconde o formulário de login -->
<?php if (isset($_COOKIE["usuario_logado"])) { ?>
	<p class="text-success">Você está logado como <?=$_COOKIE["usuario_logado"]?>.</p>
<?php } else { ?>

	<h2 class="form-signin-heading">Entre com sua conta</h2>
 		
 		<form action="login.php" method="post">
 		<table class="table">
 			<tr>
 				<td>E-mail</td>
 				<td><input class="form-control" type="email" name="email"></td>
 			</tr>
 			<tr>
 				<td>Senha</td>
 				<td><input class="form-control" type="password" name="senha"></td>
 			</tr>
 			<tr>
 				<td><button class="btn btn-primary">Entrar</button>
 			</tr> 			
 		</table>
 		</form>
 		<?php } ?>

<?php include("rodape.php");?>