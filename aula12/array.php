<?php 

$lista = array ();

$pessoa = array ();
$pessoa ["nome"] = "Israel";
$pessoa ["sobrenome"] = "Braga";
$pessoa ["endereco"] = "Brasília - DF";

$pessoa2 = array ();
$pessoa2 ["nome"] = "Steve";
$pessoa2 ["sobrenome"] = "Jobs";
$pessoa2 ["endereco"] = "San francisco - CA";





$lista [] = $pessoa;
$lista [] = $pessoa2;

?>






<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Arrays</title>
</head>
<body>

<a href= "index.html">Voltar</a>
<p>
<a href= "lancador_de_dados_com_array.php"> Lançador de dados com array</a>
</p>
<h1>Arrays</h1>


<p> <?php echo "{$pessoa ["nome"]} {$pessoa ["sobrenome"]}"; ?></p>





</body>
</html>