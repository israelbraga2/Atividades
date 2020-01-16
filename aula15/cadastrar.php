<?php
$method = $_SERVER ["REQUEST_METHOD"];

if ($method =="POST"){
	//EU QUERO FAZER UM NOVO CADASTRO PARA ESSE USUÁRIO
	session_start();

	if ( isset ( $_SESSION ["lista"] )== false) {
		$_SESSION["lista"] = array();
	}
	$lista = $_SESSION ["lista"];

	$email= $_POST ["email"];
	$senha= $_POST ["senha"];


	$usuario = array();
	$usuario ["email"] = $email;
	$usuario ["senha"] = $senha;

	
	//logica para verificar se o email ja esta cadastrado
	$emailcadastrado = false;
	foreach ($lista as $u){

		if ($u["email"] == $usuario ["email"]){
			$emailcadastrado = true;
			break;
		}
	}
	 
	//verifica após a logica, se email não está cadastrado
	if ($emailcadastrado == false){
		$lista[] = $usuario;
		$_SESSION["lista"] = $lista;
		header ("Location: cadastro_sucesso.php");
		exit();


	}


}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Cadastro | Usuários</title>
</head>
<body>
	<a href="usuarios.php">Voltar</a>
	<h1>Cadastro de Usuário</h1>
	<form method="POST">
		<p>
			<label>E-mail:</label> <input type="email" name="email" />
		</p>
		<p>
			<label>Senha:</label> <input type="password" name="senha" />
		</p>
		<input type="submit" value="cadastrar" />

		<?php if (isset ($emailcadastrado) and $emailcadastrado == true ) {?>
		<p>*E-mail ja cadastrado, tente novamente.</p>
		<?php }?>
	</form>

</body>
</html>
