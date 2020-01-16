<?php 
$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){
	$email = $_POST ["email"];
	$senha = $_POST ["senha"];
	
	$link = mysqli_connect("localhost", "root", "");
	
	$resultado = mysqli_query($link, "INSERT INTO cadastro_usuario1.cadastro_usuario1 (email, senha) VALUES ('$email', '$senha')");
	
	
	
	
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
<h1> Cadastre um novo usuário</h1>
<form method ="POST" action ="cadastrar.php">

<p>
<label>E-mail:</label> <input type="email" name="email"/>
</p>
<p>
<label>Senha:</label> <input type="password" name="senha"/>
</p>
<input type="submit" value="Cadastrar"/>

</form>

<?php if (isset ($resultado) and  $resultado){?> 

<p> Cadastro feito com sucesso!!</p>
<?php }else if  (isset ($resultado) and $resultado == false) { ?>
<p> *Verifique o erro e tente novamente!</p>

<?php }?>




</body>
</html>