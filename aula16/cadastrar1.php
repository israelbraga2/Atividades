<?php 
$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){

session_start();

if (isset ($_SESSION ["lista"]) == false ){
	$_SESSION ["lista"] = array ();

}


$lista = $_SESSION ["lista"];

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuario = array();
$usuario ["email"] = $email;
$usuario ["senha"] = $senha;

$emailcadastrado = false;
foreach ($lista as $u){
	if ($u ["email"] == $usuario ["email"] ){
		$emailcadastrado = true;
		break;
		
	}
}
if ($emailcadastrado == false){
	$lista[]= $usuario;
	$_SESSION["lista"] = $lista;
	header ("Location: cadastro_sucesso1.php" );
	exit();
}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Cadastro de Usuários</title>
</head>
<body>
<a href="usuarios1.php">Voltar</a>
<h1>Cadastro de Usuários</h1>
<form method= "POST">

<p>
<label>E-mail:</label><input type="email" name="email"/>
</p>
<p>
<label>Senha:</label><input type="password" name="senha"/>
</p>
<input type="submit" value="cadastrar" />











</form>
</body>
</html>