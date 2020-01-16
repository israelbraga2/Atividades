<?php

$link = mysqli_connect("localhost", "root", "");

$resultado = mysqli_query($link, "SELECT * FROM cadastro_usuario1.cadastro_usuario1");

$usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Listar | App Usuários</title>
</head>
<body>
	<a href="usuarios_mysql.php">Voltar</a>
	<h1>Todos usuários</h1>

	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>E-mail</td>
				<td>Senha</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($usuarios as $u) {?>
			<tr>
				<td><?php echo $u["id"]; ?></td>
				<td><?php echo $u["email"]; ?></td>
				<td><?php echo $u["senha"]; ?></td>
			</tr>
			<?php }?>
		</tbody>

	</table>


</body>
</html>
