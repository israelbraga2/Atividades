<?php

$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){

	$email= $_POST ["email"];
	$senha= $_POST ["senha"];

	$link = @mysqli_connect("localhost", "root", "");

	$linkErro = mysqli_connect_errno();


	if ($linkErro == 0){

		$resultado = mysqli_query($link, "SELECT * FROM cadastro_usuario1.cadastro_usuario1 WHERE email = '$email'");

		if($resultado){

			if ($resultado->num_rows == 0){
					
					
					
				$resultado = mysqli_query ($link, "INSERT INTO cadastro_usuario1.cadastro_usuario1 (email, senha) VALUES ('$email', '$senha')");

				if ($resultado){
					$rowsAffected = mysqli_affected_rows($link);

					if ($rowsAffected > 0) {
						$mensagem = "Cadastro feito com sucesso!";
						
						
					}
					}
					} else {
				$mensagem = "E-mail já cadastrado. Cadastre-se com outro e-mail";

				}
				
			}
		}

}
	?>







<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Cadastro | App Usuários</title>
</head>
<body>
	<a href="usuarios.php">Voltar</a>
	<h1>Cadastre um Usuário</h1>

	<form method="POST" action="cadastrar.php">
		<p>
			<label> E-mail:</label><input type="email" name="email" />
		</p>
		<p>
			<label>Senha:</label><input type="password" name="senha" />
		</p>
		<input type="submit" value="cadastrar" />

		<?php if (isset ($mensagem)){ ?>
		<p>
		<?php echo $mensagem;?>
		</p>
		<?php }else if ($method == "POST"){?>
		<P> Erro ao cadastrar, Tente novamente</P>
		
		
		
		<?php }?>
		
		
		



	</form>




</body>
</html>