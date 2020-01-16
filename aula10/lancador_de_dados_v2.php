<?php
$method= $_SERVER["REQUEST_METHOD"];

if ($method =="POST"){

	$minimo = $_POST ["minimo"];
	$maximo = $_POST ["maximo"];
	$resultado = rand($minimo, $maximo);

}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<a href="index.html">voltar</a>
	<h1>lancador de dados v2</h1>
	<form method="POST">

		<P>
			<label>Informe um valor minimo: </label> <input name="minimo"
				type="number" />
		</P>
		<p>
			<label>Informe um valor maximo:</label> <input name="maximo"
				type="number" />
		</p>
		<input type="submit" />



	</form>
	<?php if ($method == "POST"){?>

	<h1>
		Valor sorteado:
		<?php echo $resultado; ?>
	</h1>
	<?php }?>
</body>
</html>
