<?php
include('conexao.php');
global $link;
if ( isset($_POST["ids"]) == false ) {
	$ids = array();
} else {
	$ids = $_POST["ids"];
}
$erro = array();
foreach ($ids as $id) {
	$resultado = mysqli_query($link, "DELETE FROM cadastro_usuario1.cadastro_usuario1 WHERE idcadastro_usuario1= $id");
	if ($resultado) {
		$linhasAfetadas = mysqli_affected_rows($link);
		if ($linhasAfetadas == 0) {
			$erro[] = $id;
		}
	} else {
		$erro[] = $id;
	}
}
header('Location: listar.php');