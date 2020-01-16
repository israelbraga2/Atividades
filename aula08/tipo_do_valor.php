<?php
$method = $_SERVER["REQUEST_METHOD"];

if ( $method == "POST"){
	$valor = $_POST ["valor"];
	if (is_numeric($valor) ){

		$tipo = "numérico";

	}else{
		$tipo = "não é numérico";

	}



}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>tipo do valor</title>
</head>
<body>
<?php if ($method == "GET"){?>
	<form method="post">
		<label>Digite um valor:</label> <input name="valor" /> <input
			type="submit" />


	</form>
	<?php } else {?>
	<h1>
		Tipo do valor informado:
		<?php echo $tipo?>
	</h1>

	<?php }?>
</body>
</html>
