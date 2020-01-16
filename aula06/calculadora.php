<?php 

$method = $_SERVER["REQUEST_METHOD"];
$ehpost = $method == "POST";

if ($ehpost) {

//variaveis para os numeros

$num1= $_POST["num1"];
$num2= $_POST["num2"];

$soma = $num1 + $num2 ;
$sub = $num1 - $num2 ;
$mult = $num1 * $num2 ;
$div = $num1 / $num2 ;




}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>calculadora</title>
</head>
<body>
      <h1>calculadora</h1>
      <form method="post">
      <label>numero1 </label>
      <input name="num1"/>
      <label>numero2</label>
      <input name="num2"/>
      <input type="submit"/>
      
      </form>
      
      <?php if($ehpost) {       ?>                  
            
   
      
      <p>numero 1: <?php echo $num1;  ?></p>  
      <p>numero 2: <?php echo $num2;  ?></p>
      <h2>resultados</h2>
      
      <p>soma = <?php echo $soma; ?></p>
      <p>sub  = <?php echo $sub; ?></p>
      <p>mult = <?php echo $mult; ?></p>
      <P>div  = <?php echo $div; ?></P>
      
      
      <?php }?>
           
</body>
</html>