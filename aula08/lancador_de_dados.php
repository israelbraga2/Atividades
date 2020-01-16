<?php
$method = $_SERVER ["REQUEST_METHOD"];

if($method=="POST") {
	$valor1= $_POST["valor1"];
	$valor2= $_POST["valor2"];
	$resultado= rand($valor1, $valor2);

}


?>








<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>lancador_de_dados</title>
</head>
<body>
<?php if ($method=="GET") { ?>
	<form method="POST">
		<p>
			<label>informe um valor mínimo:</label> <input name="valor1"
				type="number" />
		</p>
		<p>
			<label>informe um valor máximo:</label> <input name="valor2"
				type="number" />
		</p>

		<input type="submit" />

		<form />
		<?php } else { ?>

		<h1>Resultado:</h1>

		<?php }	?>
		<?php if ($method=="POST"){ ?>
		<?php echo "$resultado"?>
		<?php } else {?>
		<?php } ?>

</body>
</html>
