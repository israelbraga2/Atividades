<?php 
$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){
	
	session_start();
	if(isset ($_SESSION ["lista"]) == false ){
		$_SESSION ["lista"]= array();
	}
	
	$lista = $_SESSION["lista"];
	$email = $_POST ["email"];
	
	$usuarioremovido = false;
	foreach ($lista as $i => $u){
		if ($lista [$i]["email"]== $email ){  
			unset ($lista [$i]);
			$usuarioremovido = true;
			$mensagem = "*Usuario removido com sucesso!";
			break;
		}
	}
	$_SESSION["lista"]= $lista;
}




?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Remover Usuários</title>
</head>
<body>

<a href="usuarios1.php">Voltar</a>
<h1>Remova um Usuário</h1>
<form method ="POST">

<p>
<label>E-mail:</label><input type="email" name="email"/>
</p>
<input type="submit" value="Remover"/>
</form>
<?php if (isset ($usuarioremovido)and $usuarioremovido == true ){?>
<p>*Usuário REMOVIDO com Sucesso!</p>
<?php }?>
</body>
</html>