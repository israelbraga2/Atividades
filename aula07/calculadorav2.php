<?php
$method = $_SERVER["REQUEST_METHOD"];
$ehpost = $method == "POST";

if ($ehpost) {

	//variaveis para os numeros

	$num1= $_POST["num1"];
	$num2= $_POST["num2"];

	//validacao dos números

	if (true){

		if (10 == 10){

		} else {
		}


	}
	//verificar se $num1 é numerico

	if (is_numeric($num1) ){
	}
	else {
		echo "numero 1 nao é um valor numerico, informe um valor";
	}
	if (is_numeric($num2) ) {
	}
	else {
		echo "numero 2 nao é um valor numerico, informe um valor";
	}
	if ($num2!= 0){
			
		$soma = $num1 + $num2;
		$sub  = $num1 - $num2;
		$mult = $num1 * $num2;
		$div  = $num1 / $num2;
			
	}
	else {
		echo "número 2 precisa ser diferente de zero.";
	}


}



?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>calculadorav2.php</title>
</head>
<body>
	<h1>calculadorav2.php</h1>

	<form method="post">
		<label>numero1</label> <input name="num1"> <label>numero2</label> <input
			name="num2"> <input type="submit" />

	</form>

	<?php if ($ehpost) {?>

	<?php if (is_numeric($num1)){?>
	<?php if (is_numeric($num2)){?>
	<?php if (is_numeric($num2 != 0)){?>


	<p>
		numero 1:
		<?php echo $num1;?>
	
	
	<p />
	<p>
		numero 2:
		<?php echo $num2;?>
	
	
	<p />
	<h2>Resultados</h2>

	<p>
		$soma =
		<?php echo $soma;?>
	
	
	<p />
	<p>
		$sub =
		<?php echo $sub;?>
	
	
	<p />
	<p>
		$mult =
		<?php echo $mult;?>
	
	
	<p />
	<p>
		$div =
		<?php echo $mult;?>
	
	
	<p />

	<?php }?>
	<?php }?>
	<?php }?>
	<?php }?>




</body>
</html>
