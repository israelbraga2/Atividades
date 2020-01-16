<?php
include ("classes/usuario.class.php");
include ("classes/tarefa.class.php");
include ("conexao.php");
global $link;

session_start();

$usuario = $_SESSION["usuarioLogado"];

$resultado = mysqli_query($link, "SELECT * FROM lista_tarefas.tarefa WHERE id_usuario = {$usuario->id}");

$tarefas = array();

if ($resultado) {

    if ($resultado->num_rows > 0) {

        while ($tarefa = mysqli_fetch_object($resultado, 'Tarefa')) {
            $tarefas[] = $tarefa;
        }
    }
}

if (isset($_SESSION["msgAdicionar"])) {
    $msgAdicionar = $_SESSION["msgAdicionar"];
    unset($_SESSION["msgAdicionar"]);
}
if (isset($_SESSION["msgProcessar"])) {
    $msgProcessar = $_SESSION["msgProcessar"];
    unset($_SESSION["msgProcessar"]);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Home | Lista de Tarefas</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>Home</h1>

	<fieldset>
		<legend>Nova Tarefa</legend>
		<form method="POST" action="adicionar.php">
			<p>
				<label>Título: </label> <input type="text" name="titulo" />
			</p>
			<input type="submit" value="Adicionar" />
		</form>
		<?php if ( isset( $msgAdicionar ) ) {?>
    		<p>
    		<?php echo $msgAdicionar; ?>
    		</p>
		<?php } ?>
	</fieldset>

	<h2>Suas tarefas:</h2>

	<form method="POST" action="processar_tarefas.php">
		<table>
			<thead>
				<tr>
					<td></td>
					<td>Tarefa</td>
				</tr>
			</thead>
			<tbody>
        		
        	<?php foreach($tarefas as $t) { ?>
        	<tr>
					<td><input type="checkbox" name="tarefas[]"
						value="<?php echo $t->id; ?>" /></td>
					<td><?php echo $t->titulo; ?> ( <?php echo $t->finalizada ? "Finalizada" : "Em aberto";  ?> )</td>
				</tr>
        	<?php } ?>
	
		</tbody>
		</table>
		<select name="modo">
			<option value="finalizar" selected>Finalizar</option>
			<option value="excluir">Excluir</option>
		</select> 
		<input type="submit" value="Executar" />
		<?php if ( isset( $msgProcessar ) ) {?>
    		<p>
    		<?php echo $msgProcessar; ?>
    		</p>
		<?php } ?>
	</form>
</body>
</html>
