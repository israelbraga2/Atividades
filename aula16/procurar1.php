<?php

$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){

	session_start();

	if (isset ($_SESSION ["lista"])==false ){
		$_SESSION ["lista"] = array();

	}
	$lista = $_SESSION["lista"];
	$email = $_POST ["email"];

	$u_perfil = NULL;
	$emailcadastrado = false;
	foreach ($lista as $u ){
		if ($u["email"] == $email){
			$emailcadastrado = true;
			$u_perfil = $u;
			break;
		}
	}

	if ($emailcadastrado){
		$_SESSION["u_perfil"]=$u_perfil;
		header ("Location: perfil1.php");
		exit();
	}

}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Procurar Usuários</title>
</head>
<body>
	<a href="usuarios1.php">Voltar</a>
	<h1>Procure um Usuário:</h1>
	<form method="POST">
		<p>
			<label>E-mail</label><input type="email" name="email" />
		</p>
		<input type="submit" value="procurar" />
		<?php if (isset ($emailcadastrado)and $emailcadastrado == false){?>
		<p>*E-mail não cadastrado</p>
		<?php } ?>



	</form>

</body>
</html>
