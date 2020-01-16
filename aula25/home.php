<?php
include ("classes/Usuario.php");
include ("classes/Tarefa.php");
include ("conexao.php");
global $link;
session_start();
if (isset($_SESSION["usuarioLogado"])) {
    $usuario = $_SESSION["usuarioLogado"];
}
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST") {
    $titulo = $_POST["titulo"];
    $resultado = mysqli_query($link, "INSERT INTO lista_tarefas.tarefa (titulo, finalizada, id_usuario) VALUES ('$titulo', 0, {$usuario->id})");
    if ($resultado) {
        $linhasAfetadas = mysqli_affected_rows($link);
        if ($linhasAfetadas > 0) {
            $msg = "Tarefa adicionada com sucesso";
        } else {
            $msg = "Erro ao adicionar tarefa. Tente novamente";
        }
    } else {
        $msg = "Erro no banco de dados. Tente novamente";
    }
}
// Quero buscar no banco todas as tarefas do usuário logado
$resultado = mysqli_query($link, "SELECT * FROM lista_tarefas.tarefa WHERE id_usuario = {$usuario->id}");
if ($resultado) {
    $tarefas = array();
    while ($obj = mysqli_fetch_object($resultado, 'Tarefa')) {
        $tarefas[] = $obj;
    }
} else {
    $msgTarefas = "Erro de conexão. Tente novamente";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<?php if ( isset($usuario)) {?>
		<a>Usuário online: <?php echo $usuario->email; ?></a>
	<?php } else {?>
		<a>Usuário offline</a>
	<?php } ?>
	<h1>Home</h1>
	<fieldset>
		<legend>Adicionar Tarefa</legend>
		<form method="POST" action="home.php">
			<p>
				<label>Título: </label> <input type="text" name="titulo" />
			</p>
			<input type="submit" value="Adicionar" />
			<?php if ( isset($msg) ) {?>
				<p><?php echo $msg; ?></p>
			<?php } ?>
		</form>
	</fieldset>

	<h2>Suas tarefas</h2>
	<?php foreach ($tarefas as $t) {?>
	
		<p><?php echo $t->titulo; ?> 
		(
		<?php
            if ($t->finalizada) {
                echo "Finalizada";
                
            } else {
                echo "Em aberto";
            }
            ?>
		)</p>
		
	<?php }?>
</body>
</html>