<?php
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST"){

	$minimo = $_POST ["minimo"];
	$maximo = $_POST ["maximo"];
	$ndezenas = $_POST ["ndezenas"];

	$sorteados = array();

	for ($i = 0; $i < $ndezenas ;$i++ ) {

		for( $adicionado = false; $adicionado == false;){
				

			$dezena = rand($minimo, $maximo);
			 
			if (in_array ( $dezena , $sorteados ) == false ) {
				$sorteados [] = $dezena ;
				$adicionado = true;

			}
		}
	}

	sort ( $sorteados );
}else {

	$minimo = 1;
	$maximo = 60;
	$ndezenas = 6;
}



?>





<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Loteria</title>
</head>
<body>

	<a href="index.html">Voltar</a>
	<h1>Loteria</h1>
	<form method="POST">

		<p>
			<label>Mínimo: </label><input type="number" name="minimo"
				valor="<?php echo $minimo ; ?>" />

		</p>
		<p>
			<label>Maximo</label><input type="number" name="maximo"
				valor="<?php echo $maximo ; ?>" />
		</p>
		<label>ndados</label><input type="number" name="ndezenas"
			value=" <?php  echo $ndezenas ; ?>" />
		</p>
		<input type="submit" value="sortear" />
	</form>











	<?php if ($method == "POST"){ ?>
	<h2>Dezenas Sorteadas:</h2>
	<p>
	<?php echo implode (" | ", $sorteados);?>
	</p>
	<?php }?>



</body>
</html>
