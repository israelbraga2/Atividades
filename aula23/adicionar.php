<?php
include("classes/usuario.class.php");
include("conexao.php");
global $link;

session_start();

$usuarioLogado = $_SESSION["usuarioLogado"];

$titulo = $_POST["titulo"];

$resultado = mysqli_query($link, "INSERT INTO lista_tarefas.tarefa (titulo, finalizada, id_usuario) VALUES ('$titulo', false, {$usuarioLogado->id})");

if($resultado) {
	
	$linhasAfetadas = mysqli_affected_rows($link);
	
	if ($linhasAfetadas > 0) {
	    
		$_SESSION["msgAdicionar"] = "Tarefa adicionada com sucesso";
		header("Location: home.php");
		exit();
		
	}
	
} else {
	echo mysqli_error($link);
	exit();
}

$_SESSION["msgAdicionar"] = "Erro ao adicionar tarefa. Tente novamente";
header("Location: home.php");



