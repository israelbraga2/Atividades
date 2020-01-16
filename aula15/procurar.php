<?php 
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST"){
	
	session_start();
	
	if (isset ($_SESSION ["lista"]) == false ){
		$_SESSION ["lista"] = array();
	}
	$lista = $_SESSION ["lista"];
	
	$email = $_POST ["email"];
	
	//logica para procurar usuário na lista.
	//se o usuário estiver cadastrado, precisaremos referenciar esse usuário específico na sessão.
	
	$u_Perfil = NULL;
	$emailcadastrado = false;
	foreach ($lista as $u) {
		
		if ($u["email"]== $email){
			$emailcadastrado = true;
			$u_Perfil = $u;
			break;
		}
	}


//verifica se o usuário realmente está cadastrado.

if ($emailcadastrado) {
	$_SESSION["u_Perfil"] = $u_Perfil;
	header ("Location: perfil.php");
	exit();
	
}

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Procurar | Usuários</title>
</head>
<body>
	<a href="usuarios.php">Voltar</a>
	<h1>Procure um usuário</h1>
	<form method="POST">
		<p>
			<label>E-mail: </label> <input type="email" name="email" />
		</p>
		<input type="submit" value="Procurar" />
		<?php if ( isset($emailcadastrado) and $emailcadastrado == false ) {?>
		<p>* E-mail não cadastrado.</p>
		<?php } ?>
	</form>
</body>
</html>



