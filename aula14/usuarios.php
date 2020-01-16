<?php 
session_start();
$login = $_SESSION["login"];







?>




<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Usuários</title>
</head>
<body>
<a href = "/Atividades/aula14">Voltar - Aula 14</a>
<h1>Faça seu login</h1>
<form method = "POST" action = "login.php">
<label>E-mail</label> <input type= "email" name = "email" />
<p>
<label>Senha</label> <input type= "password" name= "senha"/>
<p>
<input type= "submit" value= "entrar">

<?php  if ($login == false ) { ?>
<p>* Email / Senha inválidos. </p>
<?php }?>
</form>

</body>
</html>