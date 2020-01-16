<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Faça seu cadastro</title>
</head>
<body>
	<h1>Faça seu cadastro:</h1>
	<form method="POST" action="cadastrar.php">
		<p>
			<label>E-mail:</label><input type="email" name="email" />
		</p>
		<p>
			<label>Senha:</label><input type="password" name="senha" />
		</p>
		<input type="submit" value="Cadastrar" />
	</form>
	<p>
	Já possui uma conta?  <a href="lista_tarefas.php">Faça seu login</a>
</p>
</body>
</html>
