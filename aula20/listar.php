<?php

$usuarios = array();

include ('conexao.php');
global $link;

$resultado = mysqli_query($link, "SELECT * FROM cadastro_usuario1.cadastro_usuario1");

if($resultado) {
	$usuarios = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Lista de Usuários Cadastrados</title>
</head>
<body>
	<a href="usuarios.php">Voltar</a>
	<h1>Usuários cadastrados</h1>
	<form method= "POST" action ="remover_multi.php">
		<table>
			<thead>
				<tr>
					<td>Selecionar</td>
					<td>Id</td>

					<td>E-mail</td>

					<td>Senha</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($usuarios as $u) { ?>
				<tr>
					<td><input type="checkbox" name="ids[]" value="<?php echo $u ["id"]; ?>"/></td>
					<td><?php echo $u["idcadastro_usuario1"]; ?></td>
					<td><?php  echo $u ["email"];?></td>
					<td><?php  echo $u ["senha"];?></td>
				</tr>
				<?php } ?>



			</tbody>

		</table>
		<input type="submit" value="Excluir" />

	</form>
</body>
</html>
