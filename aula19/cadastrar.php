<?php
$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){
	$email = $_POST ["email"];
	$senha = $_POST ["senha"];

	$link = mysqli_connect("localhost", "root", "");

	$resposta = mysqli_query($link,"SELECT *FROM cadastro_usuario1.cadastro_usuario1 WHERE email = '$email'");

	if ($resposta->num_rows > 0 ){
		$msg = "E-mail ja cadastrado. Por favor, Informe outro e-mail";
	}else{

		$resposta = mysqli_query($link, "INSERT INTO cadastro_usuario1.cadastro_usuario1 (email, senha) VALUES ('$email', '$senha')");

		if ($resposta) {
			$msg = "Cadastro feito com sucesso!";

		} else {
			$msg = "Erro ao Cadastrar usuário. Tente novamente";


		}


	}

}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Cadastar | App Usuários</title>
</head>
<body>
	<a href="usuarios_mysql.php">Voltar</a>
	<h1>Cadastre um novo usuário</h1>
	<form method="POST" action="cadastrar.php">

		<p>
			<label>E-mail:</label> <input type="email" name="email" />
		</p>
		<p>
			<label>Senha:</label> <input type="password" name="senha" />
		</p>
		<input type="submit" value="Cadastrar" />

		<?php if (isset ($msg)) {?>
		<p>
		<?php  echo $msg; ?>
		</p>
		<?php }?>


	</form>
</body>
</html>
