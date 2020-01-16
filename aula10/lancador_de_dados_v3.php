<?php 
$method= $_SERVER ["REQUEST_METHOD"];

if ($method == "POST"){
	
	$minimo = $_POST ["minimo"];
	$maximo = $_POST ["maximo"];
	$dados  = $_POST ["dados"];
}


?>



<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

<?php 
if ($method == "GET" ){  ?>
<form method = "POST" >

    <p>
       <label> minimo: </label> <input type = "number" name = "minimo" />
    </p>
    <P>
	<label> maximo: </label> <input type = "number" name = "maximo" />
	</P>
	<P>
	<label> nº de dados: </label> <input type = "number" name = "dados" />
	</P>
	<input type="submit"/>
	


</form>

<a href="index.html">voltar</a>
	<h1>lançador de dados v3</h1>


<?php } else { ?>
<h1> valores classificados: </h1>

<?php for ($i = 0 ; $i < $dados ; $i ++ ){ ?>
	<h3>
	<?php  echo rand ( $minimo , $maximo ); ?>
	
	</h3>
	
	<?php } ?>
	<?php } ?>
	



</body>
</html>