<?php 
$method = $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){
	
	$minimo = $_POST ["minimo"];
	$maximo = $_POST ["maximo"];
	$ndados = $_POST ["ndados"];
	$resultados = array ();
	
	
	for ($i = 0; $i < $ndados; $i++) {
		$resultados []= rand($minimo, $maximo);
		
	}
}





?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Lançador de dados</title>
</head>
<body>

<a href="/atividades/aula12">Voltar</a>
	<h1> Lançador de dados com array</h1>
	
	<?php  if ($method == "GET") {?>
	
	<form method = "POST">
	
	<p>
	    <label>Mínimo</label>
	    <input type="number" name= "minimo"/>
	
</p>
	<p>
	    <label>Maximo</label>
	    <input type="number" name= "maximo"/>
</p>
        <label>ndados</label>
	    <input type="number" name= "ndados"/>
</p>
        <input type="submit" value="lancar dados"/>	
	
	
	
	</form>
	
	<?php } else {?>
	
	<h2>Com implode:</h2>
	<?php echo implode(" | " , $resultados);?>
	
	<h2>Com for:</h2>
	<?php for ($i = 0; $i < $ndados; $i++) { ?>
	<p>Dado <?php echo ($i + 1);?> : <?php echo $resultados [$i]; ?> </p>
	     <?php }?>
	<?php }?>
	
	
</body>
</html>