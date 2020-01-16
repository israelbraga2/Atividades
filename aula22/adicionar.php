<?php

include ("conexao.php");
global $link;

session_start();
$usuarioLogado = $_SESSION["usuarioLogado"];

$titulo = $_POST["titulo"];

$resultado = mysqli_query($link, "INSERT INTO");

if ($resultado){
	
	if($linhasAfetadas > 0 ){
		header ("Location: home.php");
		exit();
	}
}

$_SESSION ["erroAoAdicionarTarefa"] = "Erro ao adicionar tarefa. Tente novamente";
header("Location: home.php");


