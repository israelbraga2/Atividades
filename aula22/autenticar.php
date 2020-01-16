<?php 
include ("classes/usuario.class.php");
include ("conexao.php");
global $link;

$email = $_POST["email"];
$senha = $_POST["senha"];

$resultado = mysqli_query($link, "SELECT * FROM cadastro_usuario1.cadastro_usuario1 WHERE email = '$email' and senha = '$senha'");

if ($resultado){
	
	if ($resultado->num_rows == 1){
		//Usuário logado.
		
		$usuarioLogado = mysqli_fetch_object($resultado, 'Usuario');
		
		session_start();
		$_SESSION["usuarioLogado"] = $usuarioLogado;
		header("Location: home.php");
		exit();
	}else{
		//E-mail/senha inválidos
	}
}

mysqli_close($link);
?>