<?php
session_start();

if ( isset( $_SESSION["erro_login"] ) ) {
    
    $erro = $_SESSION["erro_login"];
    
    // unsetar a variável de erro da sessão para que seja usada apenas 1 vez a cada tentativa errada
    unset($_SESSION["erro_login"]);
    
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Lista de Tarefas</title>
</head>
<body>
	<a href="index.html">Voltar</a>
	<h1>Lista de Tarefas</h1>
	<form method="POST" action="autenticar.php">
		<p>
			<label>E-mail: </label> <input type="email" name="email" />
		</p>
		<p>
			<label>Senha: </label> <input type="password" name="senha" />
		</p>
		<input type="submit" value="Entrar" />
		<?php if ( isset( $erro ) ) {?>
		<p><?php echo $erro; ?></p>
		<?php } ?>
	</form>
	<p>
		Não possui uma conta?<a href="cadastrar.php"> Faça seu cadastro</a>
	</p>
</body>
</html>