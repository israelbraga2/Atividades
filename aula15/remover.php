<?php 
$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){
	
	//SE O MÉTODO É POST, ENTAO PRECISO REMOVEWR UM USUÁRIO.
	
	//PARA ISSO VOU INICIAR A SESSÃO PARA TER ACESSO A LISTA DE USUÁRIOS
	session_start();
	
	//PEGAR A LISTA DE USUÁRIOS DA SESSÃO
	if (isset ($_SESSION ["lista"] ) == false ) {
		// SE A LISTA AINDA NÃO EXISTIR, INICIALIZA -LÁ.
		$_SESSION["lista"] = array ();
	}
	$lista = $_SESSION ["lista"];
	
	// PEGAR O EMAIL DO USUÁRIO A SER REMOVIDO (ENVIADO PELO FORM)
	$email = $_POST["email"];
	
	//PROCURAR UM USUÁRIO QUE TENHA O EMAIL NA LISTA.
	$usuárioremovido = false;
	foreach ($lista as $i => $u ){
	// verificar email do usuário
		if ( $lista[$i]["email"] == $email ) {
			unset( $lista[$i] );
			$usuarioremovido = true;
			$mensagem = "* Removido com sucesso";
			break;
		}
	}
	$_SESSION["lista"] = $lista;
}






?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Remover | Usuários</title>
</head>
<body>
	<a href="usuarios.php">Voltar</a>
	<h1>Remova um usuário</h1>
	<form method="POST">
		<p>
			<label>E-mail: </label> <input type="email" name="email" />
		</p>
		<input type="submit" value="Remover" />
	</form>
	<?php if ( isset( $usuarioRemovido ) and $usuarioremovido == true ) { ?>
		<p>* Usuário removido com sucesso</p>
	<?php } ?>
</body>
</html>




