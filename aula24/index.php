<?php
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if ($email != NULL && $senha != NULL) {

        include ("classes/Usuario.php");
        include ("conexao.php");
        global $link;

        $resultado = mysqli_query($link, "SELECT * FROM lista_tarefas.usuario WHERE email = '$email' and senha = '$senha'");

        if ($resultado && $resultado->num_rows > 0) {

            session_start();

            $usuario = mysqli_fetch_object($resultado, 'Usuario');

            $_SESSION["usuarioLogado"] = $usuario;
            header("Location: home.php");
            exit();
        } else {
            $msg = "E-mail/senha inválidos. Tente novamente";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Lista de Tarefas</title>
</head>
<body>
	<h1>Faça o Login</h1>
	<form method="post" action="index.php">
		<p>
			<label>E-mail:</label> <input type="email" name="email" />
		</p>
		<p>
			<label>Senha:</label> <input type="password" name="senha" />
		</p>

		<input type="submit" value="Entrar" />
		<?php if ( isset($msg) ) {?>
			<p><?php echo $msg; ?></p>
		<?php } ?>
	</form>

	<p>
		Não possui uma conta? <a href="cadastro.php">Faça seu cadastro</a>
	</p>
</body>
</html>












