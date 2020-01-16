<?php
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    // FILTER_VALIDATE_EMAIL -> validar email
    $emailValidacao = filter_var($email, FILTER_VALIDATE_EMAIL);
    // FILTER_SANITIZE_STRING -> garantir que o valor necessariamente é uma string
    $senhaValidacao = filter_var($senha, FILTER_SANITIZE_STRING);

    if ($emailValidacao && $senhaValidacao) {

        include ("conexao.php");
        global $link;

        $resultado = mysqli_query($link, "SELECT * FROM lista_tarefas.usuario WHERE email = '$email'");

        if ($resultado) {
            
            if ($resultado->num_rows > 0) {

                $msg = "E-mail já cadastrado. Por favor, informe outro e-mail";
            } else {

                $resultado = mysqli_query($link, "INSERT INTO lista_tarefas.usuario (email, senha) VALUES ('$email', '$senha')");

                if ($resultado) {

                    $rowsAffected = mysqli_affected_rows($link);

                    if ($rowsAffected > 0) {

                        $msg = "Usuário cadastrado com sucesso!";

                    } else {
                        $msg = "Erro ao inserir usuário. Tente novamente";
                    }
                    
                } else {
                    $msg = "Erro ao inserir usuário. Tente novamente";
                }
            }
            
        } else {
            
            $msg = "Algo deu errado. Tente novamente";
            
        }
    } else {
        
        $msg = "Preencha os campos de e-mail e senha";
        
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Cadastro | Lista de Tarefas</title>
</head>
<body>

	<h1>Abra sua conta</h1>
	<form method="POST" action="cadastro.php">
		<p>
			<label>E-mail:</label> <input type="email" name="email" />
		</p>
		<p>
			<label>Senha:</label> <input type="password" name="senha" />
		</p>

		<input type="submit" value="Cadastrar" />		
		<?php if ( isset($msg) ) {?>
			<p><?php echo $msg; ?></p>
		<?php } ?>
	</form>
	<p>
		Já possui uma conta? <a href="index.php">Faça seu login</a>
	</p>
</body>
</html>







