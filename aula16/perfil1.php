<?php 
session_start();

if (isset ($_SESSION ["u_perfil"])== false ) {
	header ("Location: usuarios1.php");
	exit();
	
}

$uperfil = $_SESSION ["u_perfil"];

$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST") {
	$emailantigo = $uperfil ["email"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	
	$lista = $_SESSION["lista"];
	
	//logica para atualizar os dados.
	foreach ($lista as $i => $u){
				
		if ( $lista[$i]["email"] == $emailantigo) {
			$lista[$i]["email"] = $email;
			$lista[$i]["senha"] = $senha;
			$uperfil["email"] = $email;
			$uperfil["senha"] = $senha;
			$mensagem = "* Dados salvos com sucesso!";
			break;
		}
	}
	
	$_SESSION["lista"] = $lista;
	$_SESSION["u_perfil"] = $uperfil;
	
	
	
	
	
	
}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Perfil | Usuários</title>
</head>
<body>
	<a href="procurar1.php">Voltar</a>
	<h1>Perfil</h1>

	<form method="POST">
		<p>
			<label>E-mail: </label> <input type="email" name="email"
				value="<?php echo $uperfil["email"]; ?>" />
		</p>
		<p>
			<label>Senha: </label> <input type="password" name="senha"
				value="<?php echo $uperfil["senha"]; ?>" />
		</p>
		<input type="submit" value="Salvar" />
	</form>
	<?php  if (isset ($mensagem)){ ?>
	<p> <?php echo $mensagem; ?> </p>
	<?php }?>

</body>
</html>














</form>
</body>
</html>