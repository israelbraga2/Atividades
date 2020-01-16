<?php
include ("classes/usuario.class.php");
session_start();

$usuario = $_SESSION["usuarioLogado"];

?>




<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Home | Lista de tarefas</title>
</head>
<body>
<a href="logout.php">Logout</a>
<h1>Home</h1>
<fieldset>
<legend>Nova Tarefa</legend>



<p>
<label>Título</label>
<input type="submit" value="Adicionar"/>




</form>
<p>Id: <?php echo $usuario->idcadastro_usuario1; ?> </p>
<p>Email:<?php echo $usuario->email; ?> </p>
<p>Senha: <?php echo $usuario->senha; ?> </p>

</body>
</html>