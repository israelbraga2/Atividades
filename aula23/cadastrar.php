<?php
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {

    include ('classes/usuario.class.php');
    include ('conexao.php');
    global $link;

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = new Usuario();

    $usuario->email = $email;
    $usuario->senha = $senha;

    $resultado = mysqli_query($link, "SELECT * FROM lista_tarefas.usuario WHERE email = '$email'");

    if ($resultado and $resultado->num_rows > 0) {

        $_SESSION["erro_cadastrar"] = "E-mail já cadastrado. Cadastre-se com outro e-mail.";
        
    } else {

        $resultado = mysqli_query($link, "INSERT INTO lista_tarefas.usuario (email, senha) VALUES ('$usuario->email', '$usuario->senha')");

        if ($resultado) {

            $rowsAffected = mysqli_affected_rows($link);

            if ($rowsAffected > 0) {

                // apagar a mensagem de erro da sessão
                unset($_SESSION["erro_cadastrar"]);

                // encaminhar usuário para página de mensagem de sucesso
                header("Location: cadastro_sucesso.php");
                exit();
            }
        }

        $_SESSION["erro_cadastrar"] = "Erro ao fazer cadastro. Tente novamente";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
	<h1>Faça seu cadastro</h1>
	<form method="POST" action="cadastrar.php">
		<p>
			<label>E-mail: </label> <input type="email" name="email" />
		</p>
		<p>
			<label>Senha: </label> <input type="password" name="senha" />
		</p>
		<input type="submit" value="Cadastrar" />
		<?php if ($method == "POST" and isset( $_SESSION["erro_cadastrar"] ) ) { ?>
		<p><?php echo $_SESSION["erro_cadastrar"]; ?></p>
		<?php } ?>
	</form>
	<p>
		Já possui uma conta?<a href="lista_tarefas.php"> Faça o login</a>
	</p>
</body>
</html>
